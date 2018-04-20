<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
        $this->call(RestoCateTableSeeder::class);
        $this->call(HoraireTableSeeder::class);
        $this->call(LocationTableSeeder::class);
    }
}
