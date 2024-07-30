<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewLoginController extends Controller
{
    public function __invoke()
    {
        return view('login');
    }
}
