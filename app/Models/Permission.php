<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function users()
    {
        return $this->hasManyThrough(User::class, Role::class);
    }
}