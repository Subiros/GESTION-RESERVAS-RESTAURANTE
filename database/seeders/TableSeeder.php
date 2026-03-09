<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('tables')->insert([
            'name' => 'Mesa 1',
            'persons_number' => 2,
            'booked' => false,
            'start_booking' => null,
            'end_booking' => null
        ]);
    }
}
