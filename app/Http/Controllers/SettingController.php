<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        if (auth()->user()->role->role !== 'superadmin') {
            abort(403);
        }

        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'nama_kepsek'   => 'nullable|string|max:255',
            'nip_kepsek'    => 'nullable|string|max:50',
            'nama_waka'     => 'nullable|string|max:255',
            'nuptk_waka'    => 'nullable|string|max:50',
        ]);

        $setting = Setting::first();
        $setting->update([
            'nama_instansi' => $request->nama_instansi,
            'nama_kepsek'   => $request->nama_kepsek,
            'nip_kepsek'    => $request->nip_kepsek,
            'nama_waka'     => $request->nama_waka,
            'nuptk_waka'    => $request->nuptk_waka,
        ]);

        return response()->json([
            'message' => 'Pengaturan instansi berhasil diperbarui'
        ]);
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:5120'
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'nama_instansi' => 'Default'
            ]);
        }

        if ($request->hasFile('logo')) {

            if ($setting->logo &&
                file_exists(storage_path('app/public/logo/' . $setting->logo))) {
                unlink(storage_path('app/public/logo/' . $setting->logo));
            }

            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/logo', $filename);

            $setting->logo = $filename;
            $setting->save();
        }

        return response()->json([
            'message' => 'Logo berhasil diperbarui!'
        ]);
    }
}