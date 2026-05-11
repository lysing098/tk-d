<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table ='tbl_team';

    protected $fillable = ['name','role','image'];
}
