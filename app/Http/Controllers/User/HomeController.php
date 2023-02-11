<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    /**
     * Home
     */
    public function index()
    {
        return view('pages.user.dashboard');
    }
}
