<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class RestaurantController extends Controller
{
    public function add() {
        $data = Storage::disk('local')->get('data\restaurant\formAdd.json');
        $data_decoded = json_decode($data,true);
        return view('admin.pages.restaurant.add', ['restaurantAdd'=> $data_decoded]);
    }

    public function postAdd() {
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
        $data = Storage::disk('local')->get('data\restaurant\one.json');
        $data_decoded = json_decode($data,true);
        return view('admin.pages.restaurant.view', ['dataViewDetail'=>$data_decoded]);
    }

    private function fieldData() {
        $in = 'data\restaurant\all.json';
        $out = 'data\restaurant\all_filted.json';
        if(Storage::disk('local')->exists($out)) {
            return json_decode(Storage::disk('local')->get($out),true);
        }
        $data = Storage::disk('local')->get($in);
        $data_decoded = json_decode($data,true);
        $data_field['fields'] = array(  'id', 'nom', 'type', 
                                        'ouverture', 'adresse', 'classement', 
                                        'contactez', 'tarif');
        foreach($data_decoded['values'] as $k => $v) {
            $data_field['values'][$k]['id'] = $v['id'];
            $data_field['values'][$k]['nom'] = $v['nom'];
            $data_field['values'][$k]['type'] = $v['type'].( $v['type_detail'] ? ' ('.$v['type_detail'].')' : '');
            $data_field['values'][$k]['ouverture'] = $v['ouverture'];
            $data_field['values'][$k]['adresse'] = $v['adresse'].', '.$v['codepostal'].' '.$v['commune'];
            $data_field['values'][$k]['classement'] = $v['classement'];
            $data_field['values'][$k]['contactez'] = 'tel: '.$v['telephone'].'<br/>'.'site: '.$v['siteweb'].'<br/>'.'email: '.$v['email'];
            $data_field['values'][$k]['tarif'] = ($v['tarifsmin']?'€':'').round($v['tarifsmin'], 2).' - '.($v['tarifsmax']?'€':'').round($v['tarifsmax'], 2);
        }
        Storage::disk('local')->put($out, json_encode($data_field));
        return $data_field;
    }

    private function field100() {
        $in = 'data\restaurant\all_filted.json';
        $out = 'data\restaurant\all_filted_100.json';
        if(Storage::disk('local')->exists($out)) {
            return json_decode(Storage::disk('local')->get($out),true);
        }
        $data = Storage::disk('local')->get($in);
        $data_decoded = json_decode($data,true);

        $data_field['fields'] = $data_decoded['fields'];

        $i = 0;
        foreach($data_decoded['values'] as $k => $v) {
            if($i++ > 100)
                break;
            $data_field['values'][$k] = $v;
        }

        Storage::disk('local')->put($out, json_encode($data_field));
        return $data_field;
    }

    public function list() {
        $data_field = $this->fieldData();
        $data_field = $this->field100();
        return view('admin.pages.restaurant.list', ['restaurants'=>$data_field]);
    }
}
