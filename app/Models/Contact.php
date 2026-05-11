<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='tbl_contact';

    protected $fillable = ['fullname','company','country','email','whatsapp','product_id','qty','message'];
}
