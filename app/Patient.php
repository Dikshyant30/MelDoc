<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 'last_name','age','disease','status','phone_number','created_by','updated_by',
    ];
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_patient', 'patient_id', 'hospital_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'patient_user', 'patient_id', 'user_id');
    }

}
