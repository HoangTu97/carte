<?php

use Illuminate\Database\Seeder;

class RestoCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'resto_cate';
        $out = 'data\restaurant\all_filted.json';
        $data = Storage::disk('local')->get($out);
        $data_decoded = json_decode($data,true);

        foreach($data_decoded['values'] as $value) {
            if ($value['type_detail']) {
                $list_cate = explode(";", $value['type_detail']);
                foreach($list_cate as $cate) {
                    $cate = DB::table('category')->where('name',$cate)->first();
                    DB::table($table)->insert([
                        'id_resto' => $value['id'],
                        'id_cate' => $cate->id
                    ]);
                }
            } else {
                $cate = DB::table('category')->where('name',$value['type'])->first();
                DB::table($table)->insert([
                    'id_resto' => $value['id'],
                    'id_cate' => $cate->id
                ]);
            }
        }
    }
}
