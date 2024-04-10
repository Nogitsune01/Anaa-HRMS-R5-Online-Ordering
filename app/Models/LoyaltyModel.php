<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyModel extends Model
{

    use HasFactory;

    protected $table = 'hrms_h2_loyalty';

    protected $fillable = [
        'name', 
    'points_required'];
}
