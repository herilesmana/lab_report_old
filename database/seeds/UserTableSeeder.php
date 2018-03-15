<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_user')->insert(array(
            [
                'nik' => '04091725749',
                'group_id' => '1',
                'dept_id' => '1',
                'name' => 'Heri Lesmana',
                'jabatan' => 'Admin',
                'email' => 'lezmanaherie@gmail.com',
                'password' => 'pengalaman',
                'created_by' => '04091725749',
                'updated_by' => '04091725749',
                'status' => 'Y'
            ]
        ));
    }
}
