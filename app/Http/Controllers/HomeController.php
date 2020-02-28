<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\User;
use App\Patient;


class HomeController extends Controller
{
    public function hospitalsByUserId($id)
    {
    $hospital=User::find($id)->hospitals;
    return $hospital; 
    }

    public function usersByHospitalId($id)
    { 
       $user=Hospital::find($id)->users;
       return $user; 
    }

    public function patientsByHospitalId($id)
    {
    $patient=Hospital::find($id)->patients;
    return $patient; 
    }
    
    public function hospitalsByPatientId($id)
    { 
       $hospital=Patient::find($id)->hospitals;
       return $hospital; 
    }

    public function patientsByUserId($id)
    {
    $patient=User::find($id)->patients;
    return $patient; 
    }

    public function usersByPatientId($id)
    { 
       $user=Patient::find($id)->users;
       return $user; 
    }
}
