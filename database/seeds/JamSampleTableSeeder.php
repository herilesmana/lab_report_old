<?php

use Illuminate\Database\Seeder;

class JamSampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_jam_sample')->insert(array(
            [
                'id' => 1,
                'jam_sample' => '06:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 2,
                'jam_sample' => '07:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 3,
                'jam_sample' => '09:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 4,
                'jam_sample' => '10:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 5,
                'jam_sample' => '12:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 6,
                'jam_sample' => '13:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 7,
                'jam_sample' => '15:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 8,
                'jam_sample' => '16:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 9,
                'jam_sample' => '18:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 10,
                'jam_sample' => '19:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 11,
                'jam_sample' => '21:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 12,
                'jam_sample' => '22:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 13,
                'jam_sample' => '00:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 14,
                'jam_sample' => '01:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 15,
                'jam_sample' => '03:00',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ],
            [
                'id' => 16,
                'jam_sample' => '04:30',
                'created_by' => '04091725749',
                'updated_by' => '04091725749'
            ]
        ));
    }
}
