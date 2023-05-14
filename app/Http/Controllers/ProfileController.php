<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function addInfo()
    {
        return view('profiles.add_info');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'last_name' => 'nullable|string|max:100',
            'patronymic' => 'nullable|string|max:100',
            'about_me' => 'nullable|string|max:150',
            'birthday' => 'nullable|date|before_or_equal:today',
            'phone' => 'nullable|string|max:11|min:11',
            'place_residence' => 'nullable|string|max:255',
            'photo_technic' => 'nullable|string|max:500',
            'site' => 'nullable|string|max:255'
        ]);

        $profile = Profile::create(
            [

            ]
        );

        $profile = Profile::find(request('user_id'));

        if (!(empty($profile->last_name))) {
            $profile->last_name = $validatedData['last_name'];
        }
        if (!(empty($profile->patronymic))) {
            $profile->patronymic = $validatedData['patronymic'];
        }
        if (!(empty($profile->about_me))) {
            $profile->about_me = $validatedData['about_me'];
        }
        if (!(empty($profile->birthday))) {
            $profile->birthday = $validatedData['birthday'];
        }
        if (!(empty($profile->phone))) {
            $profile->phone = $validatedData['phone'];
        }
        if (!(empty($profile->place_residence))) {
            $profile->place_residence = $validatedData['place_residence'];
        }
        if (!(empty($profile->photo_technic))) {
            $profile->photo_technic = $validatedData['photo_technic'];
        }

        $profile->update($profile);

        return redirect('/');
    }
}
