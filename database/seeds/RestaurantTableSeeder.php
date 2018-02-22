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
        $data = Storage::disk('local')->get('data\restaurant\all.json');
        $data_decoded = json_decode($data,true);
        
        foreach($data_decoded['values'] as $value) {
            DB::table('Restaurant')->insert([
                'id' => $value['id'],
                'name' => $value['nom'],
                'classement' => intval($value['classement']),
                'address' => $value['adresse'],
                'code_postal' => $value['codepostal'],
                'commune' => $value['commune'],
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
        }
    }
}