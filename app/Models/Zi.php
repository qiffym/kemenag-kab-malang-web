<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Zi extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['zi_category'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('zi_category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function zi_category()
    {
        return $this->belongsTo(ZiCategory::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
