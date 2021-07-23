<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
