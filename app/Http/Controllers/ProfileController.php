<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
{
    $user = $request->user();

    $setting = \App\Models\Setting::first();

    $isSuperAdmin = $user->role->role === 'superadmin';

    return view('profile.edit', compact(
        'user',
        'setting',
        'isSuperAdmin'
    ));
}


    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'name'  => $validator->errors()->first('name'),
                'email' => $validator->errors()->first('email')
            ], 422);
        }

        $user = $request->user();
        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'Profil berhasil diperbarui'
        ]);
    }

    /**
     * Update avatar
     */
   public function updateAvatar(Request $request)
{
    // Validasi file
    $request->validate([

        'avatar' => 'required|image|mimes:jpg,jpeg,png|max:10240',

    ], [

        'avatar.required' => 'Pilih foto terlebih dahulu',
        'avatar.image'    => 'File harus berupa gambar',
        'avatar.mimes'    => 'Format harus JPG atau PNG',
        'avatar.max'      => 'Ukuran foto maksimal 2 MB',

    ]);


    $user = $request->user();


    // Hapus avatar lama
    if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {

        Storage::delete('public/avatars/' . $user->avatar);

    }


    // Simpan avatar baru
    $file = $request->file('avatar');

    $filename = time() . '.' . $file->getClientOriginalExtension();

    $file->storeAs('public/avatars', $filename);


    // Update database
    $user->avatar = $filename;
    $user->save();


    return response()->json([
        'message' => 'Foto profil berhasil diperbarui'
    ]);
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
