<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name', 'location', 'contact_number','ratings','created_by','updated_by',
    ];

 
}
