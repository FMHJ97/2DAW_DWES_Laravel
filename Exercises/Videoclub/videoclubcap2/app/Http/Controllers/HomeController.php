<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Function to return the welcome view
     * @return \Illuminate\Contracts\View\View
     */
    public function getHome()
    {
        return view('welcome');
    }
}
