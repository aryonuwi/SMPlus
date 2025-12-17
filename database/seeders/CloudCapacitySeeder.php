<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CloudCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  DB::statement('TRUNCATE TABLE cloud_capacity RESTART IDENTITY CASCADE;');

        $now = now();
        DB::table('cloud_capacity')->insert([
            ['cluster_id' => 1, 'mem' => 64,  'cpu' => 16, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['cluster_id' => 1, 'mem' => 128, 'cpu' => 32, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['cluster_id' => 2, 'mem' => 256, 'cpu' => 64, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['cluster_id' => 2, 'mem' => 128, 'cpu' => 24, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['cluster_id' => 3, 'mem' => 32,  'cpu' => 8,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
