<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('profile.settings', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'allowed_ratings' => ['required', 'array', 'min:1'],
            'allowed_ratings.*' => ['string', 'in:general,sensitive,questionable,explicit'],
        ]);

        $user = Auth::user();

        $user::withoutTimestamps(fn () => $user->update([
            'allowed_ratings' => array_values(array_unique($validated['allowed_ratings'])),
        ]));

        return redirect()
            ->route('settings.edit')
            ->with('success', 'Your content preferences have been successfully updated.');
    }
}