<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LayananCategory extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];




    public function layanans()
    {
        return $this->hasMany(Layanan::class);
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
