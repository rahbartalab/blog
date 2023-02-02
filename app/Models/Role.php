<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    public static function scopeFilter($query)
    {
        $query->when(\request('name') ?? false, fn($query) => $query->where('name', 'LIKE', '%' . \request('name') . '%'));
    }

}