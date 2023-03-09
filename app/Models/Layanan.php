<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Layanan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['layanan_category'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('layanan_category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function layanan_category()
    {
        return $this->belongsTo(LayananCategory::class);
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
