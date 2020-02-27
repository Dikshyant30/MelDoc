<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name', 'location', 'contact_number','ratings','created_by','updated_by',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'hospital_user', 'hospital_id', 'user_id');
    }
 
}
