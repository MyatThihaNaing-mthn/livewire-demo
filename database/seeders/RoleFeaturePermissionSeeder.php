<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;

class RoleFeaturePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks to truncate the table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_feature_permission')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $userRoleId = DB::table('roles')->where('name', 'user')->value('id');
        $blogFeatureId = DB::table('features')->where('name', 'Blog')->value('id');

        $viewPermissionId = DB::table('permissions')->where('action', 'view')->value('id');

        $now = now();

        // Give ' user' view access to the 'Blog' feature
        if ($userRoleId && $blogFeatureId && $viewPermissionId) {
            DB::table('role_feature_permission')->insert([
                'role_id' => $userRoleId,
                'feature_id' => $blogFeatureId,
                'permission_id' => $viewPermissionId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

    }
}