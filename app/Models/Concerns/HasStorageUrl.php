<?php

namespace App\Models\Concerns;

trait HasStorageUrl
{
    protected function getCdnHostname(): string
    {
        static $hostname;

        return $hostname ??= rtrim((string) config('app.storage_url', ''), '/');
    }

    protected function getCdnUrl(?string $path): string
    {
        if ($path === null || $path === '') {
            return '';
        }

        if ($this->isAbsoluteUrl($path)) {
            return $path;
        }

        $hostname = $this->getCdnHostname();
        $path = ltrim($path, '/');

        return $hostname === '' ? $path : "{$hostname}/{$path}";
    }

    protected function isAbsoluteUrl(string $path): bool
    {
        return str_starts_with($path, 'http://')
            || str_starts_with($path, 'https://');
    }

    private function resolveImageUrl(string $columnName, string $targetExtension, string $defaultImage): string
    {
        $value = $this->getRawOriginal($columnName);

        if ($value === null || $value === '') {
            return $this->getCdnUrl($defaultImage);
        }

        if ($this->isAbsoluteUrl($value)) {
            return $value;
        }

        $path = pathinfo($value, PATHINFO_EXTENSION) === ''
            ? "{$value}.{$targetExtension}"
            : $value;

        return $this->getCdnUrl($path);
    }
}