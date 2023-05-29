<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PostAbout;
use App\Models\Service;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('users')->paginate(8);
        return view('auth.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        //dd($user);
        
 
         Service::create([            
             'title' => $request->title,
             'link' => $request->link,
             'content' => $request->content,             
             'users_id' => $user->id
 
         ]);
 
         return to_route('services.index')->with('success', 'Create Data Update successfully');
     
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        $services = Service::where('id',$id)->get();
        return view('website.services.index',compact('services','navmenu','submenu'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $Service)
    {
         $Service->delete();

        return to_route('services.index')->with('success', 'posts Data deleted successfully');
    }
}
