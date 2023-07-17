<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Post\CreateRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostAbout;
use App\Models\SubAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($request != "") {
            $posts = Post::where('title', 'like', "%{$search}%")->paginate(10);
            //$posts = Post::with('gallery', 'category')->paginate(10);

        } else {
            $posts = Post::with('gallery', 'category')->paginate(10);
        }
        //return $posts;
        return view('auth.posts.index', compact('posts', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('auth.posts.create', ['category' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:3', 'max:255', 'string'],
            'category' => ['required'],
            'file' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'content' => 'required',
            'publish' => ['required'],

        ]);

            if($request->hasFile('file')) {
                //get filename with extension
                $filenamewithextension = $request->file('file')->getClientOriginalName();
         
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
         
                //get file extension
                $extension = $request->file('file')->getClientOriginalExtension();
         
                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;
         
                //Upload File
                //$request->file('file')->storeAs('public/images/posts', $filenametostore);
                $request->file('file')->storeAs('public/images/posts/thumbnail', $filenametostore);
               
                //Resize image here
                //$thumbnailpath = public_path('storage/images/posts/thumbnail/'.$filenametostore);
                $thumbnailpath = public_path('storage/images/posts/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(250, 250, function($constraint) {
                    $constraint->aspectRatio();
                });
                    $img->save($thumbnailpath);

                    $gellery = Gallery::create([
                        'image' => $filenametostore
                    ]);


            }

           

            Post::create([
                'category_id' => $request->category,
                'title' => $request->title,
                'content' => $request->content,
                'publish' => $request->publish,
                'gallery_id' => $gellery->id
            ]);

             //dd($content);


        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // dd(compact('post'));
        $post = Post::where('id', $id)->get();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        $img = Gallery::all();
        $cat = Category::all();

        //dd($post);
        return view('website.posts.index', compact('post', 'navmenu', 'submenu', 'img', 'cat'));
    }

    public function showall(string $id)
    {
        // dd(compact('post'));
        $posts = Post::where('publish', 1)->get();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        $img = Gallery::all();
        $cat = Category::where('id', $id)->get();
        //$cat = Category::all();

        //dd($post);
        return view('website.postsall.index', compact('posts', 'navmenu', 'submenu', 'img', 'cat'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //dd($post);
        $cat = Category::all();

        return view('auth.posts.edit', compact('post', 'cat'), ['category' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

     

        if($request->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            //$request->file('file')->storeAs('public/images/posts', $filenametostore);
            $request->file('file')->storeAs('public/images/posts/thumbnail', $filenametostore);
           
            //Resize image here
            //$thumbnailpath = public_path('storage/images/posts/thumbnail/'.$filenametostore);
            $thumbnailpath = public_path('storage/images/posts/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(250, 250, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
                $img->save($thumbnailpath);

                Gallery::where('id', $post->gallery->id)->update(['image' => $filenametostore]);

           
            // echo (json_encode([
            //     'default' => asset('storage/uploads/'.$filenametostore),
            //     '400' => asset('storage/uploads/thumbnail/'.$filenametostore),
            // ]);)
     
           // return redirect('auth.editor')->with('success', "Image uploaded successfully.");
        }

        return to_route('posts.index')->with('success', 'posts Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('success', 'posts Data deleted successfully');
    }
}
