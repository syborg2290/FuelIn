<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;


class ParentController extends Controller
{
    /**
     * Add Middleware For All Controller
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('StationValidate');
   }
}
