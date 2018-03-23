<?php

use Illuminate\Database\Seeder;

class AuthPermissionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('auth_permission')->insert(array(
            [
                'id' => '1',
                'name' => 'Master User',
                'codename' => 'master_user',
            ],
            [
                'id' => '2',
                'name' => 'Master Department',
                'codename' => 'master_department',
            ],
            [
                'id' => '3',
                'name' => 'Master Variant Product',
                'codename' => 'master_variant_product',
            ],
            [
                'id' => '4',
                'name' => 'Master Shift',
                'codename' => 'master_shift',
            ],
            [
                'id' => '5',
                'name' => 'Master Line',
                'codename' => 'master_line',
            ],
            [
                'id' => '6',
                'name' => 'Master Auth',
                'codename' => 'master_auth',
            ],
            [
                'id' => '7',
                'name' => 'Input Sample Minyak',
                'codename' => 'input_sample_minyak',
            ],
            [
                'id' => '8',
                'name' => 'Approve Sample Minyak',
                'codename' => 'approve_sample_minyak',
            ],
            [
                'id' => '9',
                'name' => 'View Sample Minyak',
                'codename' => 'view_sample_minyak',
            ],
            [
                'id' => '10',
                'name' => 'Report Sample Minyak',
                'codename' => 'report_sample_minyak',
            ],
            [
                'id' => '11',
                'name' => 'Input Sample Mie',
                'codename' => 'input_sample_mie',
            ],
            [
                'id' => '12',
                'name' => 'Approve Sample Mie',
                'codename' => 'approve_sample_mie',
            ],
            [
                'id' => '13',
                'name' => 'View Sample Mie',
                'codename' => 'view_sample_mie',
            ],
            [
                'id' => '14',
                'name' => 'Report Sample Mie',
                'codename' => 'report_sample_mie',
            ],
            [
                'id' => '15',
                'name' => 'Set Shift',
                'codename' => 'set_shift',
            ],
        ));
    }
}
