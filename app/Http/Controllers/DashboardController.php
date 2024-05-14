<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller implements HasMiddleware
{
    public function dashboardView()
    {
        return view('dashboard.dashboard');
    }

    //Get the middleware that should be assigned to the controller.
    public static function middleware()
    {
        return ['auth'];
    }
}
