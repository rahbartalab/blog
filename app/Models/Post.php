<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\String\s;

/**
 * App\Models\Post
 *
 * @method static create(mixed[] $postFields)
 * @property int $id
 * @property int $user_id
 * @property PostTypeEnum $type
 * @property string $slug
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property PostStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post filter()
 * @method static \Illuminate\Database\Eloquent\Builder|Post filterByCategories()
 * @method static \Illuminate\Database\Eloquent\Builder|Post filterByUser()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'status' => PostStatusEnum::class,
        'type' => PostTypeEnum::class
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query)
    {
        /* --!> filter post fields <!-- */
        $query->when(request('q') ?? false,
            fn($query) => $query
                    ->where('title', 'LIKE', '%' . request('q') . '%')
                    ->orWhere('body', 'LIKE', '%' . request('q')) . '%');

        $query->when(request('type') ?? false,
            fn($query) => $query->where('type', request('type'))
        );

        $query->when(request('status') ?? false,
            fn($query) => $query->where('status', request('status'))
        );
    }

    public function scopeFilterByCategories(Builder $query)
    {
        $query->when(request('categories') ?? false,
            fn($query) => $query->whereHas('categories',
                fn($query) => $query->whereIn('id', request('categories'))
            ));
    }

    public function scopeFilterByUser(Builder $query)
    {
        $query->when(request('user_id') ?? false,
            fn($query) => $query->whereHas('user',
                fn($query) => $query->where('id', request('user_id'))
            ));
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @throws Exception
     */
    protected function date(): Attribute
    {
        $date = new \DateTime($this->published_at);
        return Attribute::make(
            get: fn() => $date->format('Y-m-d')
        );
    }

}
