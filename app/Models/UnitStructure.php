<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitStructure extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function unit_category()
    {
        return $this->belongsTo(UnitCategory::class);
    }
}
