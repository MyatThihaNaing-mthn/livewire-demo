<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_GUEST = 'guest';
   
    protected $fillable = ['name', 'description'];

    public function users(): HasMany{
        return $this->hasMany(User::class,'role_id');
    }

    public function permissions(): BelongsToMany{
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
