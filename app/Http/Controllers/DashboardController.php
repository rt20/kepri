<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Schedule;

class DashboardController extends Controller
{
    
    public function index()
    {
       
        $schedule = Schedule::count();
        
        return view ('dashboard',[
            'schedule' => $schedule
    ]);
        
    }

    
}
