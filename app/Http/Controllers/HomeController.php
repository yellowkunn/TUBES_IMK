<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $role=Auth()->user()->role;

            if($role=='user')
            {
                return view ('beranda');
            }
            else if ($role=='admin')
            {
                return view ('owner.dashboard');
            }
            else 
            {
                return redirect()->back();
            }
        }
    }
}
