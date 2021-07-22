<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'laptop_id',
        'kota',
        'kecamatan',
        'kode_pos',
        'alamat',
        'duration',
        'total_price',
        'pickup_date',
        'status',
    ];
}
