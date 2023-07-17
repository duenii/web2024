<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PostAbout;
use App\Models\Service;
use App\Models\SubAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

      
        // *** เขียนแบบ php 

        // if ($_FILES['file']['name']) {
        //     if (!$_FILES['file']['error']) {
        //       $name = md5(rand(100, 200));
        //       $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        //       $filename = $name.
        //       '.'.$ext;
        //       $destination = '/assets/images/'.$filename; //change this directory
        //       $location = $_FILES["file"]["tmp_name"];
        //       move_uploaded_file($location, $destination);
        //       echo 'images/'.$filename; //change this URL
        //     } else {
        //       echo $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
        //     }
        //   }
 

        $this->validate($request, [
            'title' => 'required',
        ]);
 
        $data = $request->input('content');
 
        $dom = new \DOMDocument();

        $dom->loadHtml($data, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('img');

       

        foreach($imageFile as $item => $image){

            $data = $image->getAttribute('src');
             $data = $image->getAttribute('src');


            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $imgeData = base64_decode($data);

            $image_name= "/upEditor/" . time().$item.'.png';

            $path = public_path() . $image_name;

            //file_put_contents($path, $imgeData);

            Storage::put($path, $imgeData);
     
                $image->removeAttribute('src');       
                //you can remove the data-filename attribute here too if you want.
                $image->setAttribute('src', Storage::url($path));

                 

            // $image->removeAttribute('src');

            // $image->setAttribute('src', $image_name);

        }

       

       
 
        //updating the summernote WYSIWYG markdown output.
        $data = $dom->saveHTML();

          Service::create([            
              'title' => $request->title,
              'link' => $request->link,
             'content' => $data,             
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
    public function edit(Service $service)
    {
        $services = Service::all();

        return view('auth.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $Service)
    {
        $data = $request->input('content');
 
        //loading the html data from the summernote editor and select the img tags from it
        $dom = new \DomDocument();
        $dom->loadHtml($data, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        
        foreach($images as $k => $img){
            //for now src attribute contains image encrypted data in a nonsence string
            $data = $img->getAttribute('src');
           
            //getting the original file name that is in data-filename attribute of img
            $file_name = $img->getAttribute('data-filename');

            //extracting the original file name and extension
            
            $arr = explode('.', $file_name);
            $upload_base_directory = 'public/upEditor/';

             ///** change name file upload */        
 
           // $original_file_name=$k.time();
            $original_file_name = time();
            $original_file_extension='png';
 
            if (sizeof($arr) ==  2) {
                 $original_file_name = $arr[0];
                 $original_file_extension = $arr[1];
            }
            else
            {
                 //the file name contains extra . in itself
                 $original_file_name = implode("_",array_slice($arr,0,sizeof($arr)-1));
                 $original_file_extension = $arr[sizeof($arr)-1];
            }
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
 
            $data = base64_decode($data);
 
            $path = $upload_base_directory.$original_file_name.'.'.$original_file_extension;
 
            //uploading the image to an actual file on the server and get the url to it to update the src attribute of images
            Storage::put($path, $data);
 
            $img->removeAttribute('src');       
            //you can remove the data-filename attribute here too if you want.
            $img->setAttribute('src', Storage::url($path));
            // data base stuff here :
            //saving the attachments path in an array
        }
 
        //updating the summernote WYSIWYG markdown output.
        $data = $dom->saveHTML();

        $Service->update($request->all());
        // dd($request->all());
        return to_route('auth.services.index')->with('warning', 'Edit Data Update successfully');
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