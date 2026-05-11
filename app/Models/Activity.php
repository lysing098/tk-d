<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table ='tbl_activities';

    protected $fillable = ['title','description','category','image'];
}
