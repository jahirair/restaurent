<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'expert',
        'image',
        // 'facebook_link',
        // 'twitter_link',
        // 'instagram_link',
        // 'behance_link',
        // 'googleplus_link',
    ];
}
