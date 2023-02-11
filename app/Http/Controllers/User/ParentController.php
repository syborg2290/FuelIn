<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{
      /**
     * Add Middleware For All Controller
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('UserValidate');
   }
}
