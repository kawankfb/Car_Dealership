<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductUploadController extends Controller
{
    public function index() {
        return view('product_upload');
     }
     public function showUploadFile(Request $request) {
        $file = $request->file('image');
     
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
     
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
     
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
     
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
     
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
     
        //Move Uploaded File
        $destinationPath = 'uploaded_images';
        $file->move($destinationPath,$file->getClientOriginalName());
     }
    //
}
