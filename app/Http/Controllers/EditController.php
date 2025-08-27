<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user login sekarang
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // validasi
        $validated = $request->validate([
            'user_fullname' => 'required|string|max:100',
            'user_email' => 'required|email|max:50|unique:users,user_email,' . $id . ',user_id',
            'user_nohp' => 'required|string|max:13',
            'user_alamat' => 'required|string|max:200',
            'user_password' => 'nullable|min:6',
            'user_profil_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // kalau ada upload foto
        if ($request->hasFile('user_profil_url')) {
            $path = $request->file('user_profil_url')->store('profil', 'public');
            $validated['user_profil_url'] = $path;
        }

        // kalau ada password baru
        if (!empty($request->user_password)) {
            $validated['user_password'] = Hash::make($request->user_password);
        } else {
            unset($validated['user_password']); // biar password lama tetap
        }

        $user->update($validated);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
