<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->delete();

        $subject=['kemiskinan','ipm','tenaga kerja','pdrb lapangan usaha','pdrb pengeluaran'];

        foreach ($subject as $obj) {
            Subject::create(array(
                'subject_name'=>$obj,
            ));

        }
    }
}
