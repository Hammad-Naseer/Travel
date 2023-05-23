<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardConroller extends Controller
{
    public function dashboard(){
        return view('dashboard.index');
    }
}
