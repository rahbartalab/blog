<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];


    public function scopeFilter($query)
    {
        /* --!> name filter <!-- */
        $query->when(\request('name') ?? false,
            fn($query) => $query->where('name', 'LIKE', '%' . \request('name') . '%')
        );

    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
