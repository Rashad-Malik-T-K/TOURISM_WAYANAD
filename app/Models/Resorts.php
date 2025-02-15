<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resorts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'image',
        'price',
        'url'
    ];
}
