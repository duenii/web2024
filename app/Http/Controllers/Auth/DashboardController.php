<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\File;
//use App\Models\File;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
          $posts = Post::count();
  		  $banner = Banner::count();
		  $files = File::count();
          $service = Service::count();
          $adminweb = User::all();


		return view('auth.main', compact('posts','banner','files','adminweb','service'));
    }

}
