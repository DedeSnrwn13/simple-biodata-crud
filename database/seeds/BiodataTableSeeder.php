<?php

use Illuminate\Database\Seeder;

class BiodataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biodata = [
            [
                'nama' => 'DedeSunarwan',
                'alamat' => 'Cibadak Sukabumi',
                'pekerjaan'=> 'Pelajar'
            ],
            [
                'nama' => 'Dewi Kartini NS',
                'alamat' => 'Parungkuda Sukabumi',
                'pekerjaan' => 'Pegawai Pabrik'
            ],
            [
                'nama' => 'Panji Panca Oktora',
                'alamat' => 'Cicurug Sukabumi',
                'pekerjaan' => 'Siswa SD'
            ]
        ];

        DB::table('biodata')->insert($biodata);
    }
}
