<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table ='tbl_gallery';

    protected $fillable = ['images'];

    protected $casts = [
        'images' => 'array',
    ];

}
