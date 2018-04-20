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
        $table = "restaurant";
        $out = 'data\restaurant\all_filted.json';

        // main function
        $data = Storage::disk('local')->get($out);
        $data_decoded = json_decode($data,true);

        foreach($data_decoded['values'] as $value) {
            DB::table($table)->insert([
                'id' => $value['id'],
                'name' => $value['nom'],
                'classement' => intval($value['classement']),
                'email' => $value['email'],
                'website' => $value['siteweb'],
                'facebook' => $value['facebook'],
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