<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Herosection extends Model
{
    protected $table = 'tbl_hero_section';

    protected $fillable = ['title','sub_title','background_image','page','btn_primary_text','btn_primary_link','btn_secondary_text','btn_secondary_link'];
}
