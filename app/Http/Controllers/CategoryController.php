<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function list() {
        $cate = Category::where('idparent', 0)->get()->toArray();
        //$i = 0;
        foreach($cate as $k => $v) {
            $v['cate_parent'] = '';
            $cache[] = $v;
            $temp[$k] = Category::where('idparent', $v['id'])->get()->toArray();
            foreach($temp[$k] as $value) {
                $value['cate_parent'] = $v['nom'];
                $cache[] = $value;
            }
        }
        
        

        $data['fields'] = ['id', 'nom','cate_parent','img','details'];
        $data['values'] = $cache;
        return view('admin.pages.cate.list', ['cate'=>$data]);
    }

    public function edit() {
        return view('admin.pages.cate.edit');
    }

    public function postEdit() {

    }

    public function delete() {

    }

    public function add() {

    }

    public function postAdd() {

    }

    public function view($id) {
        $data = Category::where('id', $id)->first()->toArray();
        if ($data['idparent']) {
            $parent = Category::where('id',$data['idparent'])->first()->toArray();
            $data['cate_parent'] = $parent['nom'];
        }
        unset($data['idparent']);
        return view('admin.pages.cate.view', ['dataViewDetail'=>$data]);
    }
}
