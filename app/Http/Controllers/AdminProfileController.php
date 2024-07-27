<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function settings()
    {
        // Menampilkan halaman pengaturan profil
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ]);
    
        $user = Auth::user();
        $user->update($request->all());
    
        return redirect()->route('admin.settings')->with('success', 'Profile updated successfully.');
    }


}
