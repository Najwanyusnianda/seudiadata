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

        $subject=['Kemiskinan','IPM','Tenaga Kerja','PDRB Lapangan Usaha','PDRB Pengeluaran'];

        foreach ($subject as $obj) {
            Subject::create(array(
                'subject_name'=>$obj,
            ));

        }
    }
}
