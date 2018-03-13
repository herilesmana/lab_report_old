<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_department')->insert(array(
          [
            'id' => '1',
            'name' => 'ite',
            'created_by' => '04091737549',
            'updated_by' => '04091737549'
          ],
          [
            'id' => '2',
            'name' => 'QA',
            'created_by' => '04091737549',
            'updated_by' => '04091737549'
          ]
        ));
    }
}
