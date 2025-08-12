<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class PermissionChecker
{
    /**
     * Check if the user has a specific permission.
     *
     * @param \App\Models\User $user
     * @param string $permission
     * @return bool
     */
    public static function hasPermissionOnFeature($userId, $permission, $feature)
    {
        $permissions = Cache::get("user_permissions_{$userId}", []);

        $featurePermission = "{$feature}.{$permission}";

        return in_array($featurePermission, $permissions);
    }
}