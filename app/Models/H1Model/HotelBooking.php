<?php

namespace App\Models\H1Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;
    protected $table = 'hrms_h1_hotel_reserve';
    protected $fillable = [
        'reserve_code',
        'room_no',
        'start_date', 
        'end_date',
        'name',
        'email',
        'duration',
        'additional' ,
        'price' ,
        'contact', 
        'room_type',
        'status'
    ];
}
