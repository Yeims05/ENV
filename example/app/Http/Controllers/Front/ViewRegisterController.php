<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewRegisterController extends Controller
{
    public function __invoke()
    {
        return view('register');
    }
}
