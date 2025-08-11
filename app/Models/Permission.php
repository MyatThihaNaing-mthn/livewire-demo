<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Feature;
use App\Models\Role;

class Permission extends Model
{
    public const ACTION_VIEW = 'view';
    public const ACTION_EDIT = 'edit';
    public const ACTION_DELETE = 'delete';
    public const ACTION_CREATE = 'create';

    protected $fillable = ['action', 'description'];

    public static function getAllowedActions()
    {
        return [
            self::ACTION_VIEW,
            self::ACTION_EDIT,
            self::ACTION_DELETE,
            self::ACTION_CREATE,
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }

    public function features()
    {
        return $this->belongsTo(Feature::class);
    }

}
