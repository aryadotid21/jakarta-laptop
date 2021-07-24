<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laptop;
class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
    ];
    public function laptop()
    {
        return $this->hasMany(Laptop::class);
    }   
}
