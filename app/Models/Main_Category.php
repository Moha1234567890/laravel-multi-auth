<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

  

    protected $table = 'main_categories';

    protected $fillable = [

    	'trans_lang',
    	'trans_of',
    	'name',
    	'slug',
        'photo',
        'active',
    	'created_at',
    	'updated_at'
    ];

   public $timestamps = false;
}
