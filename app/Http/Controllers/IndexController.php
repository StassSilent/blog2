<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function getIndex()
    {
        return view('index');
    }


    public function message()
    {
        return view('block_message');
    }



}
