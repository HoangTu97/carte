<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add() {
        return view('admin.pages.user.add');
    }

    public function list() {
        return view('admin.pages.user.list');
    }

    public function edit() {
        return view('admin.pages.user.edit');
    }
}
