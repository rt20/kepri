<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Schedule;

class DashboardController extends Controller
{
    
    public function index()
    {
        // return view ('dashboard');
        $borrow = Borrow::orderBy('id', 'desc')->paginate(10);
        $schedule = Schedule::count();
        
        return view ('dashboard',[
            'borrow' => $borrow,
            'schedule' => $schedule
    ]);
        
    }

    
}
