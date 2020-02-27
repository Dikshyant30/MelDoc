<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\User;


class HomeController extends Controller
{
    public function manyToMany()
    {
    //    $hospital=User::find(1)->hospitals;
    //    return $hospital;
       $user=Hospital::find(1)->users;
       return $user;
       
    }
}
