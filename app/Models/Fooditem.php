<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fooditem extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}
