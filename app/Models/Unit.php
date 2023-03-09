<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Unit extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'unit_category'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('unit_category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['search'] ?? false, function ($query, $seach) {
            return $query->where('title', 'like', '%' . $seach . '%')
                ->orWhere('body', 'like', '%' . $seach . '%');
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit_category()
    {
        return $this->belongsTo(UnitCategory::class);
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
