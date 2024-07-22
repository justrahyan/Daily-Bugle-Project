<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Logic untuk mengambil data dashboard
        return view('admin.dashboard');
    }

    public function manageNews()
    {
        // Logic untuk mengambil data berita
        return view('admin.news');
    }

    public function manageCategories()
    {
        // Logic untuk mengambil data kategori
        return view('admin.categories');
    }

    public function manageUsers()
    {
        return view('admin.users');
    }

    public function settings()
    {
        // Logic untuk mengambil data pengaturan
        return view('admin.settings');
    }
}
