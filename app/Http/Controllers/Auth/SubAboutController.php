<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostAbout;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class SubAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $subabouts = SubAbout::with('postabouts', 'users')->orderBy('postabouts_id')->paginate(10);
        //return $posts;
        return view('auth.subabouts.index', compact('subabouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postabouts = PostAbout::all();

        return view('auth.subabouts.create',compact('postabouts'));
    }

    // 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
       // $postabouts = SubAbout::with('postabouts')->get();

       //dd($postabouts->id);

        SubAbout::create([
            'postabouts_id' => $request->postabouts,
            'title' => $request->title,
            'link' => $request->link,
            'content' => $request->content,             
            'users_id' => $user->id

        ]);

        return to_route('subabouts.index')->with('success', 'Create Data Update successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //dd($id);
        $cat = Category::all();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        $subabouts = SubAbout::where('id',$id)->get();
        return view('website.subabouts.index',compact('subabouts','navmenu','submenu','cat'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubAbout $subabout)
    {
        return view('auth.subabouts.edit', compact('subabout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubAbout $subabout)
    {
        $subabout->update($request->all());
        // dd($request->all());
        return to_route('subabouts.index')->with('warning', 'Edit Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubAbout $subabout)
    {
        $subabout->delete();

        return to_route('subabouts.index')->with('danger', 'SubMenu Data Delete successfully');
    }
}
