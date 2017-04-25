<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request){
        $image = $request->all()['image'];
        if ($image){

           echo Storage::putFile('temp'.DIRECTORY_SEPARATOR.Auth::id(), $image);
        }
        else abort(404);
    }

    public function delete(Request $request){

        if($request->has('path')){
            $path = $request->input('path');
            Storage::delete($path);
        }
    }
}
