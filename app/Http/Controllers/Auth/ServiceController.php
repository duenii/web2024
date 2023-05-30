<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PostAbout;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubAbout;
use App\Models\Visitor;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('users')->orderBy('id', 'asc')->paginate(10);
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
		$cat = Category::all();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        $services = Service::where('id',$id)->get();
		$visitors = Visitor::select('visits')->sum('visits');
        return view('website.services.index',compact('services','navmenu','submenu','cat','visitors'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('auth.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
	public function update(Request $request, Service $service)
    {
        $service->update($request->all());
        // dd($request->all());
        return to_route('services.index')->with('warning', 'Edit Data Update successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $Service)
    {
         $Service->delete();

        return to_route('services.index')->with('success', ' Deleted Data  successfully');
    }
}
