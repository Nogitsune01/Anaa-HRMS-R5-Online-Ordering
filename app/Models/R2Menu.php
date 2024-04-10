<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R2Menu extends Model
{
    use HasFactory;
    protected $table = 'hrms_r2_menu';
    protected $fillable = [
        'title',
        'category',
        'description',
        'slug',
        'price',
        'image',
    ];
}
