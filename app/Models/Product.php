<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';

    protected $fillable = [
        'title',
        'description',
        'size',
        'color',
        'images',
        'order'
    ];

    // Do NOT cast images to array — we manage JSON manually
    // so we control the encoding/decoding ourselves
}
