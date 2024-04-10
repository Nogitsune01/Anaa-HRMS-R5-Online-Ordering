<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrderingCart extends Model
{
    use HasFactory;
    protected $table = 'hrms_r5_cart_accounts';
    protected $fillable = [
        'acc_id',
        'email',
        'category',
        'title',
        'price',
        'images',
        'quantity'
    ];

}
