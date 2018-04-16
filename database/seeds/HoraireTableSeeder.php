<?php

use Illuminate\Database\Seeder;

class HoraireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horaire = 'data\\restaurant\\horaire.json';
        $table = 'horaire';
        $data = Storage::disk('local')->get($horaire);
        $data_decoded = json_decode($data, true);
        
        $data_record = array();

        function convertStringToDouble($str) {
            return (float) str_replace("h", ".",$str);
        }

        function convertStingToDay($str) {
            switch($str) {
                case 'lun': return 2;
                case 'mar': return 3;
                case 'mer': return 4;
                case 'jeu': return 5;
                case 'ven': return 6;
                case 'sam': return 7;
                case 'dim': return 8;
                default: return 0;
            }
        }

        foreach($data_decoded as $index => $value) {
            preg_match_all('/(matin|apres-midi): du (lun|mar|mer|jeu|ven|sam|dim)\. au (lun|mar|mer|jeu|ven|sam|dim)\. de (.{3,5}) (à (.{3,5}) )?/', $value['ouverture'], $matches);
            
            $data_record[$index]['id'] = $value['id'];
            foreach ($matches[1] as $i => $v) {
                    $data_record[$index][$v == "matin" ? 'matin' : 'apres-midi'] = array(
                        'du'=>convertStingToDay($matches[2][$i]), 
                        'au'=>convertStingToDay($matches[3][$i]), 
                        'de'=>convertStringToDouble($matches[4][$i]), 
                        'a'=>convertStringToDouble($matches[6][$i])
                    );
                
            }

        }

        foreach($data_record as $value) {
            if (isset($value['matin'])) {
                $begin = $value['matin']['du'];
                $end = $value['matin']['au'];
            }
            if (isset($value['apres-midi'])) {
                $begin = $value['apres-midi']['du'];
                $end = $value['apres-midi']['au'];
            }
            if (isset($value['matin']) && isset($value['apres-midi'])) {
                $begin = $value['matin']['du'] < $value['apres-midi']['du'] ? $value['matin']['du'] : $value['apres-midi']['du'];
                $end = $value['matin']['au'] < $value['apres-midi']['au'] ? $value['matin']['au'] : $value['apres-midi']['au'];
            }

            for ($i = $begin; $i <= $end; $i++) {
                
                if (isset($value['matin'])) {
                    $matin_de = $value['matin']['de'];
                    $matin_a = $value['matin']['a'];
                } else {
                    $matin_de = 0;
                    $matin_a = 0;
                }
                if (isset($value['apres-midi'])) {
                    $apres_de = $value['apres-midi']['de'];
                    $apres_a = $value['apres-midi']['a'];
                } else {
                    $apres_de = 0;
                    $apres_a = 0;
                }
                DB::table($table)->insert([
                    'id_resto' => $value['id'],
                    'jour' => $i,
                    'matin_de' => $matin_de,
                    'matin_a' => $matin_a,
                    'apres-midi_de' => $apres_de,
                    'apres-midi_a' => $apres_a
                ]);
            }

        }

    
    }
}
