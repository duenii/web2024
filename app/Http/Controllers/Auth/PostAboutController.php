<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PostAbout;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class PostAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postabouts = PostAbout::with('users')->paginate(10);
       // $subabouts = SubAbout::with('postabouts', 'users')->get();
        //return $posts;
        return view('auth.postabouts.index', compact('postabouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('auth.postabouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $user = auth()->user();
        PostAbout::create([
                'title' => $request->title,
                'link' => $request->link,
                'content' => $request->content,             
                'users_id' => $user->id
    
            ]);
            
            
        return to_route('postabouts.index')->with('success', 'Create Data Update successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostAbout $postabout)
    {
        return view('auth.postabouts.edit', compact('postabout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostAbout $postabout)
    {
        $postabout->update($request->all());
        // dd($request->all());
        return to_route('postabouts.index')->with('warning', 'Edit Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostAbout $postabout)
    {
        $postabout->delete();

        return to_route('postabouts.index')->with('danger', 'Delete Data deleted successfully');
    }
}
