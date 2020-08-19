<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

//Authenticatable is used for authincation purposes as in the user model 
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{

    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [

    	'name',
    	'photo',
    	'email',
    	'password',
    	'created_at',
    	'updated_at'
    ];

   public $timestamps = false;
}
