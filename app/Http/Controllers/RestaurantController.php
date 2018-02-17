<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class RestaurantController extends Controller
{
    public function add() {
        return view('admin.pages.restaurant.add');
    }

    public function edit() {
        return view('admin.pages.restaurant.edit');
    }

    public function list() {
        $data = Storage::disk('local')->get('data\all.json');
        $data_decoded = json_decode($data,true);
        $data_decoded['fields'] = array('id', 'nom', 'id_sitra1', 'type', 'adresse', 'codepostal', 'siteweb', 'telephone');
        return view('admin.pages.restaurant.list', ['restaurants'=>$data_decoded]);
    }
}
