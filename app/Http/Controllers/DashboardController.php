<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Customer;
use App\Models\Plane;
use App\Models\Route;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $airport = Airport::count();
        $route = Route::count();
        $airline = Airline::count();
        $plane = Plane::count();
        $customer = Customer::count();
        $admin = User::where('role', '=', 'admin')->count();
        $ticket = Ticket::where('status', '=', 'Belum Terpakai')->count();

        return view('pages.dashboard', compact('airport', 'route', 'airline', 'plane', 'customer', 'admin', 'ticket'));
    }
}
