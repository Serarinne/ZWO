<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataCount extends Model
{
    protected $table = 'data_counts';

    protected $fillable = [
        'type',
        'data_id',
        'total',
    ];

    public static function recalculateCounts(string $type, string $pivotTable, string $foreignKey): int
    {
        $processedCount = 0;
        $connection = DB::connection('local');

        $existingIds = [];

        $connection->table($pivotTable)
            ->select($foreignKey, DB::raw('count(*) as total'))
            ->groupBy($foreignKey)
            ->orderBy($foreignKey)
            ->chunk(1000, function ($counts) use (&$processedCount, &$existingIds, $type, $foreignKey, $connection) {
                $upsertData = [];
                $now = now();

                foreach ($counts as $row) {
                    $dataId = $row->{$foreignKey};

                    $existingIds[] = $dataId;

                    $upsertData[] = [
                        'type' => $type,
                        'data_id' => $dataId,
                        'total' => $row->total,
                        'updated_at' => $now,
                    ];
                }

                if (! empty($upsertData)) {
                    $connection->table('data_counts')->upsert(
                        $upsertData,
                        ['type', 'data_id'],
                        ['total', 'updated_at']
                    );

                    $processedCount += count($upsertData);
                }
            });

        $connection->table('data_counts')
            ->where('type', $type)
            ->when(! empty($existingIds), function ($query) use ($existingIds) {
                $query->whereNotIn('data_id', $existingIds);
            })
            ->delete();

        return $processedCount;
    }

    public static function recalculateTagCounts(): int
    {
        return static::recalculateCounts('tag', 'wallpaper_tag', 'tag_id');
    }

    public static function recalculateCharacterCounts(): int
    {
        return static::recalculateCounts('character', 'wallpaper_character', 'character_id');
    }

    public static function recalculateArtistCounts(): int
    {
        return static::recalculateCounts('artist', 'wallpaper_artist', 'artist_id');
    }
}