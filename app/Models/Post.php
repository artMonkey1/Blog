<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;

class Post extends Model
{
    const ACTIVE_POST = 1;
    const NOT_ACTIVE_POST = 0;

    protected $fillable = [
        'title', 'body', 'published_at', 'category_id', 'active'
    ];

    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    public function setExertAttribute($value)
    {
        $this->attributes['exert'] = Str::limit($value, 150);
    }

    public static function postsForGuests($category = null)
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\OrderBy::class,
            ])
            ->thenReturn()
            ->published()
            ->with('author')
            ->paginate();
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where('published_at', '>', Carbon::now());
    }
}
