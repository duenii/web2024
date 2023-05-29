<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostAbout;
use App\Models\Service;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $posts = Post::where('publish', 1)->get();
        $cat = Category::all();

        $banners = Banner::where('status', 1)->get();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();

        $services = Service::all();

       
        //dd( $post);
        return view('website.index', compact('posts','cat','banners','navmenu','submenu','services'));
    }

    public function show($id)
    {
       // dd(compact('post'));
       $post = Post::where('id',$id)->get();      
       $navmenu = PostAbout::all();
       $submenu = SubAbout::all();
       $img = Gallery::all();
       $cat = Category::all();
     
       //dd($post);
        return view('website.posts.index',compact('post','navmenu','submenu','img','cat'));
    }

    
    public function navmenu()
    {
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        return view('layouts.website', compact('navmenu','submenu'));
    }

}
