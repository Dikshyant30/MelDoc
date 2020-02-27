<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 'last_name','age','disease','status','phone_number','created_by','updated_by',
    ];


}
