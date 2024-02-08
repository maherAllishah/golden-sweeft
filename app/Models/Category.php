<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function vendors(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class , 'category_vendor','category_id','vendor_id');
    }
}
