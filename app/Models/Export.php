<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $table ='tbl_export';

    protected $fillable = ['title','description','image'];
}
