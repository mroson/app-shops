<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::create([
        'name' => 'Acme Corp',
        'email' => 'info@acme.com',
        'address' => '123 Acme Street',
        'phone' => '123-456-7890',
        'google_maps_url' => 'https://www.google.com/maps?q=40.748817,-73.985428', // URL de ejemplo
    ]);

    Business::create([
        'name' => 'Tech Solutions',
        'email' => 'support@techsolutions.com',
        'address' => '456 Tech Avenue',
        'phone' => '987-654-3210',
        'google_maps_url' => 'https://www.google.com/maps?q=34.052235,-118.243683', // URL de ejemplo
    ]);
    }
}
