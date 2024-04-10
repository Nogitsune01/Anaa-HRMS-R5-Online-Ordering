<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrderingAccounts extends Model
{
    use HasFactory;
    protected $table = 'hrms_r5_online_ordering_accounts';
    protected $fillable = [
        'name',
        'room_type', 
        'room_no',
        'guest_id',
        'status',
        'username',
        'password'
    ];

    public function orderCart(){
        return $this->hasMany(OnlineOrderingCart::class, 'acc_id', 'id');
    }
}
