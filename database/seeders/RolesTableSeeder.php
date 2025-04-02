<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'resident_user',
            ],
            [
                'name' => 'tourist_user',
            ],
            [
                'name' => 'admin_user',
            ],
            [
                'name' => 'business_user',
            ]
        ]);
    }
}
