<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class HomeController extends Controller
{
    public function index()
    {
       
        $schedule = Schedule::orderBy('id', 'desc')->paginate(10);
        
        return view ('home.index',[
            'schedule' => $schedule
    ]);
    }
}
