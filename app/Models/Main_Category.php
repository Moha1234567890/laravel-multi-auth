<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main_Category extends Model
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

   public function scopeActive($q) {
    return $q->where('active',1);
   }

   public function scopeSeclection($q) {
    return $q->select('id','trans_lang', 'trans_of', 'name', 'active', 'slug');
   }

}
