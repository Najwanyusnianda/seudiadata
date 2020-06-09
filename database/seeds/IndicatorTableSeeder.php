<?php

use Illuminate\Database\Seeder;
use App\DataIndikator;
class IndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('data_indikators')->delete();
        $json= File::get("database/json/indikator_init.json");
        $data=json_decode($json);
        $dt=$data;
        foreach ($dt as $obj) {
            DataIndikator::create(array(
                'subject_id'=>$obj->subject_id,
                'id'=>$obj->indikator_id,
                'indikator'=>$obj->indikator,
                'graph_type'=>$obj->graph_type
            ));

        }
    }
}
