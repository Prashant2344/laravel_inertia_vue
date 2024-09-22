<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $appends = ['category_name'];

    public function parent()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    // public function getCategoryNameAttribute()
    // {
    //     return ServiceCategory::find($this->category_id)->name ?? 'Unknown Category';
    // }
}
