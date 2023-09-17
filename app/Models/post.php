<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'number_of_product',
        'taxs',
        'image',
        'quality',
        'kind',
    ];
}
