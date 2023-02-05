<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * @method static findOrFail($id)
 */
class Role extends SpatieRole
{
    use HasFactory, SoftDeletes;

    protected $with = [
        'permissions'
    ];

    public static function scopeFilter($query)
    {
        /* --!> name filter <!-- */
        $query->when(\request('name') ?? false,
            fn($query) => $query->where('name', 'LIKE', '%' . \request('name') . '%'));

        /* --!> permissions filter <!-- */
        $query->when(request('permissions') ?? false,
            fn($query) => $query->whereHas('permissions',
                fn($query) => $query->whereIn('id', request('permissions'))
            ));
    }

    public static function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $slug = $slug . '-1';
        }
        return $slug;
    }

}
