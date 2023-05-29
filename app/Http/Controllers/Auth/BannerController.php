<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::paginate(10);
        //return $Banners;
        return view('auth.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('auth.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            if($request->has('file')){
                $file = $request->file;
                $fileName = time(). $file->getClientOriginalName();
    
                $imgePath = public_path('/images/banners');
                $file->move($imgePath, $fileName);
    
            }
            Banner::create([
               
                'name' => $request->name,
                'image' => $fileName,
                'status' => $request->status
                
    
            ]);
        }
        catch(\Exception $ex){
            dd($ex->getMessage());

        }

       //$request->session()->flash('alert-success', 'Banner Created Successfully');
       //$request->session()->flash('status', 'Task was successful!');
       
       return to_route('banner.index');
       
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
    public function edit(Banner $banner)
    {
        return view('auth.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        if($request->has('file')){
            $file = $request->file;
            $fileName = time(). $file->getClientOriginalName();

            $imgePath = public_path('/images/banners');
            $file->move($imgePath, $fileName);
            
            Banner::where('id',$banner->id)->update(['image' => $fileName]);

        }
       
        $banner->update($request->all());
        // dd($request->all());
        return to_route('banner.index')->with('warning', 'Edit Data Update successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //dd($id);
         $banner->delete();
         return to_route('banner.index')->with('danger', 'Banners Data Deleted successfully');
    }
        
}
