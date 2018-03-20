<?php

use Illuminate\Database\Seeder;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $in = 'data\restaurant\all.json';
        $out = 'data\restaurant\all_filted.json';

        // field data
        if(!Storage::disk('local')->exists($out)) {
            $data = Storage::disk('local')->get($in);
            $data_decoded = json_decode($data,true);

            $data_field['fields'] = $data_decoded['fields'];

            foreach($data_decoded['values'] as $k => $v) {
                if ($v['type'] == "RESTAURATION")
                    $data_field['values'][] = $v;
            }
            Storage::disk('local')->put($out, json_encode($data_field));
        }

        // main function
        $data = Storage::disk('local')->get($out);
        $data_decoded = json_decode($data,true);
        
        foreach($data_decoded['values'] as $value) {
            DB::table('restaurant')->insert([
                'id' => $value['id'],
                'name' => $value['nom'],
                'classement' => intval($value['classement']),
                'email' => $value['email'],
                'website' => $value['siteweb'],
                'facebook' => $value['facebook'],
                'type' => $value['type'],
                'type_detail' => $value['type_detail'],
                'tarifenclair' => $value['tarifsenclair'],
                'tarifmax' => round($value['tarifsmax'], 2),
                'tarifmin' => round($value['tarifsmin'], 2),
                'telephone' => $value['telephone'],
                'telephonefax' => $value['telephonefax'],
                'fax' => $value['fax'],
                'created_date' => $value['date_creation'],
                'edited_date' => $value['last_update_fme'],
                'producteur' => $value['producteur']
            ]);
            DB::table('location')->insert([
                'id_rest' => $value['id'],
                'address' => $value['adresse'],
                'code_postal' => $value['codepostal'],
                'commune' => $value['commune'],
            ]);
        }
    }
}