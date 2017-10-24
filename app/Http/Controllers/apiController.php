<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class apiController extends Controller
{
    public function vueIndex()
    {
        return User::orderBy('id', 'DESC')->take(5)->get();
    }
}
