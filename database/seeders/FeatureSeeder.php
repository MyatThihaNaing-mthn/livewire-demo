<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['name' => 'Blog', 'description' => 'Blog features of the application'],
        ];

        foreach ($features as $feature) {
            \App\Models\Feature::firstOrCreate(
                ['name' => $feature['name']],
                ['description' => $feature['description']]
            );
        }

    }
}
