<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundImages extends Model
{
    use HasFactory;

    protected $table = 'background_images';

    protected $fillable = [
      'aboutus_bg',
      'auth_bg'
    ];
}
