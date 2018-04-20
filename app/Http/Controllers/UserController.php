<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function add() {
        return view('admin.pages.user.add');
    }

    public function list() {
        $user = User::select('id', 'username', 'email','level')->get()->toArray();
        $data_field['fields'] = ['id', 'username', 'email', 'level'];
        foreach($user as $i => $v) {
            foreach($v as $k => $value) {
                if ($k == 'level') {
                    $data_field['values'][$i][$k]  = $value ? 'admin' : 'member';
                } else {
                    $data_field['values'][$i][$k] = $value;
                }
            }
        }
        
        return view('admin.pages.user.list', ['data'=>$data_field]);
    }

    public function view($id) {
        $user = User::where('id',$id)->first()->toArray();
        $user['level'] = $user['level'] ? 'admin' : 'member';
        return view('admin.pages.user.view', ['dataViewDetail' => $user]);
    }

    public function edit() {
        return view('admin.pages.user.edit');
    }

    public function delete($id) {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('admin/user/list');
    }

    public function getLogin() {
        return view('admin.pages.signin');
    }

    public function postLogin(Request $req) {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password, 'level'=>true]))
            return redirect('admin');
        return redirect('login');
    }

    public function getRegister() {
        return view('admin.pages.signup');
    }

    public function postRegister(Request $req) {
        $user = new User;
        $user->username = $req->username;
        $user->password = bcrypt($req->password);
        $user->email = $req->email;
        $user->level = true;
        $user->save();

        return redirect('login');
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
