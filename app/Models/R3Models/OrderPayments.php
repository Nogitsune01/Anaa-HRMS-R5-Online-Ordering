<?php

namespace App\Models\R3Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderPayments extends Model
{
    use HasFactory;
    protected $table = 'hrms_r3_payment';
    protected $fillable = [
        'acc_id',
        'customer_name',
        'customer_email',
        'item_name',
        'category',
        'quantity',
        'total_price',
        'status'
    ];

    public function belongsToUser(){
        return $this->belongsTo(User::class, 'id', 'acc_id');
    }
}
