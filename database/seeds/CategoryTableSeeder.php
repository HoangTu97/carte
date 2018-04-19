<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'category';
        $out = 'data\restaurant\all_filted.json';
        $data = Storage::disk('local')->get($out);
        $data_decoded = json_decode($data,true);

        // add parent category
        $parentCate = $data_decoded['values'][0]['type'];
        if (!DB::table($table)->where('name',$parentCate)->exists()) {
            DB::table($table)->insert([
                'name' => $parentCate,
                'idparent' => 0
            ]);
        }

        foreach($data_decoded['values'] as $value) {
            if($value['type_detail']) {
                $list_cate = explode(";", $value['type_detail']);
                foreach($list_cate as $cate) {
                    if(!DB::table($table)->where('name',$cate)->exists()) {
                        $parent = DB::table($table)->where('name',$value['type'])->first();
                        DB::table($table)->insert([
                            'name' => $cate,
                            'idparent' => $parent->id
                        ]);
                        
                    }
                }
            }
        }

    }
}
