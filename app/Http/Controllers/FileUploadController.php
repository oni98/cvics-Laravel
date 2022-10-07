<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    public function index(){
        $files = FileUpload::all();
        return view('backend.files.index', ['files'=> $files]);
    }

    public function store(Request $request){
        $file = new FileUpload();
        $file->name = $request->name;
        $file->date = $request->date;

        $image_name = $request->name.'-'.time() . '.' . $request->file->getClientOriginalExtension();
        $path = $request->file->storeAs('public/files/', $image_name);
        $file->file = $image_name;

        if($file->save()){
            session()->flash('success', 'File Uploaded Successfully');
            return back();
        }
    }

    public function destroy($id){

        $files = FileUpload::find($id);
        if($files->delete()){
            if (file_exists(public_path('storage/files/' . $files->file))) {
                unlink(public_path('storage/files/' . $files->file));
            }
            session()->flash('success', 'File Deleted Successfully');
            return back();
        }
    }
}
