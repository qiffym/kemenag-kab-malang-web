<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZiCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function zis()
    {
        return $this->hasMany(Zi::class);
    }
}
