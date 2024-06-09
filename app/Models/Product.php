<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'name',
        'price',
        'description',
        'rating',
        'categories',
        'image1',
        'image2',
        'image3',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
