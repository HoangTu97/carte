<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() {
        return view('admin.pages.index');
    }

    public function error404() {
        return view('admin.404');
    }

    public function signin() {
        return view('admin.pages.signin');
    }

    public function signup() {
        return view('admin.pages.signup');
    }
}
