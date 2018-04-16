<?php

use Illuminate\ Database\ Seeder;

class LocationTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public
    function run() {
        $api_keys = array(
            env('GOOGLE_API_KEY', 'AIzaSyD5_8b7XGLJ_665C2Og6YV8Two7XOPN4h8'),
            env('GOOGLE_API_KEY_2', 'AIzaSyAIKAChlwMHxXoIW95UdgDmU5cQy23Zi8o'),
            env('GOOGLE_API_KEY_3', 'AIzaSyA7Dxr163l0sH-gBMCGhU4T4XgKNYN-pYA'),
            env('GOOGLE_API_KEY_4', 'AIzaSyD164wJgRiJnqXZ87m6MRutlq1qYzu8DL8')
        );
        $table = "location";
        $error_request_file = 'data\\restaurant\\error_request.json';
        $out = 'data\restaurant\all_filted.json';

        // main function
        $data = Storage::disk('local')->get($out);
        $data_decoded = json_decode($data, true);

        $api_key_i = 0;
        $request_faild = array();
        foreach($data_decoded['values'] as $value) {
            if ($value['adresse']) {
                $url = "https://maps.googleapis.com/maps/api/geocode/json" 
                        . "?address=".urlencode($value['adresse']);
                $geo_locat = json_decode(file_get_contents(
                    //https://maps.googleapis.com/maps/api/geocode/json?address=3+rue+Tramassac&key=...
                    $url . "&key=".$api_keys[$api_key_i]), true);

                switch ($geo_locat['status']) {
                    case 'OVER_QUERY_LIMIT':
                        {
                            $api_key_i++;
                            $geo_locat = json_decode(file_get_contents(
                                $url.
                                "&key=".$api_keys[$api_key_i]), true);
                            break;
                        }
                    case 'OK':
                        {
                            DB::table($table)->insert([
                                'id_rest' => $value['id'],
                                'address' => $value['adresse'],
                                'code_postal' => $value['codepostal'],
                                'commune' => $value['commune'],
                                'latitude' => $geo_locat['results'][0]['geometry']['location']['lat'],
                                'longitude' => $geo_locat['results'][0]['geometry']['location']['lng']
                            ]);
                            break;
                        }
                    default:
                        {
                            $request_faild[] = $value;
                        }
                }
            }
        }

        Storage::disk('local')->put($error_request_file, json_encode($request_faild));
        
        $data = Storage::disk('local')->get('data\\restaurant\\error_request.json');
        $data_decoded = json_decode($data, true);
        foreach($data_decoded as $value) {
            DB::table("location")->insert([
                'id_rest' => $value['id'],
                'address' => $value['adresse'],
                'code_postal' => $value['codepostal'],
                'commune' => $value['commune'],
                'latitude' => null,
                'longitude' => null
            ]);
        }
    }
}