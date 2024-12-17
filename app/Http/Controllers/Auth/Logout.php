<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Auth;

class Logout extends RoutingController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
