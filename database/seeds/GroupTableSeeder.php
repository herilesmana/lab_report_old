<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('auth_group')->insert(array(
            [
                'name' => 'superuser'
            ]
        ));
    }
}
