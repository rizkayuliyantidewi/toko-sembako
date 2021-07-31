<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Reksa Rangga Wardhana',
            'phone_number' => '087886565336',
            'address' => 'Malang, Jawa Timur',
        ]);
    }
}
