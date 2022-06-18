<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Plane;
use App\Models\Route;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $airport = Airport::count();
        $route = Route::count();
        $airline = Airline::count();
        $plane = Plane::count();
        return view('pages.dashboard', compact('airport', 'route', 'airline', 'plane'));
    }
}
