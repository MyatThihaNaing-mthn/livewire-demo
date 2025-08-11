<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class CacheUserPermissions
{
    
    public function handle(Login $event)
    {
        $user = $event->user;

        $permissions = DB::table('role_feature_permission')
            ->join('roles', 'roles.id', '=', 'role_feature_permission.role_id')
            ->join('features', 'features.id', '=', 'role_feature_permission.feature_id')
            ->join('permissions', 'permissions.id', '=', 'role_feature_permission.permission_id')
            ->where('roles.id', $user->role_id)
            ->select(DB::raw("CONCAT(features.name, '.', permissions.action) as name"))
            ->pluck('name')
            ->toArray();
        
        Cache::put("user_permissions_{$user->id}", $permissions, now()->addDays(7));
    }
}
