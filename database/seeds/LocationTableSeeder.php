<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = DB::table('location')->whereNull('latitude')->select('id_rest','address','latitude')->get();
        //$api_key = env('GOOGLE_API_KEY', 'AIzaSyD5_8b7XGLJ_665C2Og6YV8Two7XOPN4h8');
        $api_keys = array(
            env('GOOGLE_API_KEY', 'AIzaSyD5_8b7XGLJ_665C2Og6YV8Two7XOPN4h8'),
            env('GOOGLE_API_KEY_2', 'AIzaSyAIKAChlwMHxXoIW95UdgDmU5cQy23Zi8o'),
            env('GOOGLE_API_KEY_3', 'AIzaSyA7Dxr163l0sH-gBMCGhU4T4XgKNYN-pYA'),
            env('GOOGLE_API_KEY_4', 'AIzaSyD164wJgRiJnqXZ87m6MRutlq1qYzu8DL8')
        );
        $api_key_i = 0;
        foreach($locations as $loc) {
            if ($loc->address) {
                $geo_locat = json_decode(file_get_contents(
                    //https://maps.googleapis.com/maps/api/geocode/json?address=3+rue+Tramassac&key=...
                    "https://maps.googleapis.com/maps/api/geocode/json"
                    ."?address=".urlencode($loc->address)
                    ."&key=".$api_keys[$api_key_i]), true);
                if($geo_locat['status']=='OVER_QUERY_LIMIT') {
                    $api_key_i++;
                    $geo_locat = json_decode(file_get_contents(
                        //https://maps.googleapis.com/maps/api/geocode/json?address=Siège+:+Maison+des+Sociétés,+square+Grimma&key=...
                        "https://maps.googleapis.com/maps/api/geocode/json"
                        ."?address=".urlencode($loc->address)
                        ."&key=".$api_keys[$api_key_i]), true);
                }
                
                if ($geo_locat['status'] == "OK") {
                    DB::table('location')
                        ->where('id_rest', $loc->id_rest)
                        ->update([
                            'latitude'=>$geo_locat['results'][0]['geometry']['location']['lat'],
                            'longitude'=>$geo_locat['results'][0]['geometry']['location']['lng']
                        ]);
                }
            }
        }
    }
}
