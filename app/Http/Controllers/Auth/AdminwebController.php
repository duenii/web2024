<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminwebController extends Controller
{
    public function index()
    {
        $adminweb = User::all();
        //return $Banners;
        return view('auth.adminweb.index', compact('adminweb'));
    }

}
