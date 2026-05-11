<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'tbl_company';

    protected $fillable = ['title','description','email','tel','location'];
}
