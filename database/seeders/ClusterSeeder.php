<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('TRUNCATE TABLE cluster RESTART IDENTITY CASCADE;');

        $now = now();
        DB::table('cluster')->insert([
            ['id' => 1, 'cluster_name' => 'Cluster A', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'cluster_name' => 'Cluster B', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'cluster_name' => 'Cluster C', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
