<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use DB;
use Restaurant;

class RestaurantController extends Controller
{
    public function add() {
        $data = Storage::disk('local')->get('data\restaurant\formAdd.json');
        $data_decoded = json_decode($data,true);
        return view('admin.pages.restaurant.add', ['restaurantAdd'=> $data_decoded]);
    }

    public function postAdd(Request $req) {
        $restaurant = new Restaurant();
        $restaurant->name = $req->nom;
        $restaurant->type = 1;
        $restaurant->classement = $req->class;
        
        return redirect()->route('admin.restaurant.view',['id'=>0]);
    }

    public function edit($id) {
        $data = Storage::disk('local')->get('data\restaurant\formEdit.json');
        $data_decoded = json_decode($data,true);
        return view('admin.pages.restaurant.edit', ['restaurantEdit'=>$data_decoded,'formEditAction'=>array('admin.restaurant.postEdit',$id)]);
    }

    public function postEdit($id) {
        
    }

    public function delete($id) {
        
        return redirect()->route('admin.restaurant.list');
    }

    public function view($id) {
        $db = (array)DB::table('restaurant')->where('id', $id)->join('location', 'restaurant.id', '=', 'location.id_rest')->join('resto_cate', 'resto_cate.id_resto', '=', 'restaurant.id')->get()->toArray();
        
        foreach($db as $value) {
            $lCate[] = DB::table('category')->where('id', $value->id_cate)->first();
        }
        //dd ($lCate);
        $first = (array)$db[0];
        $first['type'] = '';
        foreach($lCate as $value) {
            $first['type'] .= $value->nom . '; ';
        }
        unset($first['id_cate']);
        unset($first['id_resto']);
        $data = $first;

        return view('admin.pages.restaurant.view', ['dataViewDetail'=>$data]);
    }

    public function list() {
        $data_field = array();
        $data_field['fields'] = ['id','nom','address','classement','contactez','tarif'];
        $data_field['values'] = json_decode(json_encode(DB::table('restaurant')
            ->join('location','restaurant.id','=','location.id_rest')
            ->select('restaurant.id', 'restaurant.nom', 'location.address','restaurant.classement', 'restaurant.website AS contactez', 'restaurant.tarifmax AS tarif')->get()->toArray()),true);
        return view('admin.pages.restaurant.list', ['restaurants'=>$data_field]);
    }


}
