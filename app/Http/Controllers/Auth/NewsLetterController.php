<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\PostAbout;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletter = NewsLetter::paginate(10);
        //return $Banners;
        return view('auth.newsletter.index', compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required', 'min:3', 'max:255', 'string',       
            'image' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required|mimes:pdf,xlx,csv,xlsx,docx|max:20971520',

        ]);

        $filenamewithextension = $request->file('image')->getClientOriginalName();
         
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('image')->storeAs('public/images/newsletter', $filenametostore);

        $file = $request->file;
				
        $name_gen = hexdec(uniqid());
                //ดึงและแปลงนามสกุลไฟล์เป็นตัวเล็ก
        $img_ext = strtolower($file->getClientOriginalExtension());
                //ต่อชื่อไฟล์		
			
        $fileName = $name_gen.'.'.$img_ext;
		//	$request->file('file')->store('files', $fileName);
             
		 $imgePath = $file->move(public_path('files'), $fileName);

         NewsLetter::create([
               
            'name' => $request->name,
            'image' => $filenametostore,
            'file' => $fileName,
            'status' => $request->status,
            'users_id' => $user->id
            

            ]);

            return to_route('newsletter.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newsletter = NewsLetter::all();
        //return $Banners;
        return view('website.newsletter.index', compact('newsletter'));
    }

    public function showtotal()
    {
        $newsletter = NewsLetter::all();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        //return $Banners;
        return view('website.newsletter.index', compact('newsletter','navmenu','submenu'));
    }
 
    /** 
     * 
     * Show the form for editing the specified resource.
     */
    public function edit(NewsLetter $newsletter)
    {
        return view('auth.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsLetter $newsletter)
    {
        $user = auth()->user();
        

        if($request->hasFile('image')) {
            $this->validate($request, [                 
                'image' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg',
               
    
            ]);
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            $request->file('image')->storeAs('public/images/newsletter', $filenametostore);
           // $request->file('file')->public_path('storage/images/banners'.$filenametostore);
           // $request->file('file')->storeAs('public/images/banners/thumbnail', $filenametostore);
            
            NewsLetter::where('id',$newsletter->id)->update(['image' => $filenametostore]);

        }
        if($request->hasFile('file')){
            $this->validate($request, [                 
                
                'file' => 'required|mimes:pdf,xlx,csv,xlsx,docx|max:20971520',
    
            ]);

            $file = $request->file;	
             //gen ชื่อไฟล์
             $name_gen = hexdec(uniqid());
             //ดึงและแปลงนามสกุลไฟล์เป็นตัวเล็ก
             $img_ext = strtolower($file->getClientOriginalExtension());
             //ต่อชื่อไฟล์
             $fileName = $name_gen .'.'.$img_ext ;

            //$fileName = time(). $file->getClientOriginalName();

            $imgePath = $file->move(public_path('files'), $fileName);

            NewsLetter::where('id',$newsletter->id)->update(['file' => $fileName]);


        }
  
        $newsletter->update([
            'name' => $request->name,                      
            'users_id' => $user->id
        ]);
        // dd($request->all());
        return to_route('newsletter.index')->with('warning', 'Edit Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsLetter $newsletter)
    {
        $newsletter->delete();

        return to_route('newsletter.index')->with('danger', 'Delete Data deleted successfully');
    }
}
