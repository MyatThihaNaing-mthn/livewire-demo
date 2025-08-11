<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = Permission::getAllowedActions();

        foreach ($actions as $action) {
            Permission::firstOrCreate(
                ['action' => $action],
                ['description' => 'Permission to ' . $action . ' on a feature']
            );
        }
    }
}
