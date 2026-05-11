<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'tbl_certificate';

    protected $fillable = ['title','image','order'];
}
