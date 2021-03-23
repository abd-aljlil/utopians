<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Volunteer;

class FileUploadController extends Controller
{
  public function pic(Volunteer $volunteer){
      
    return view('pages.file-picupload', compact('volunteer'));
  }
    
  public function doc(Volunteer $volunteer){
      
    return view('pages.file-docupload', compact('volunteer'));
  }

  public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('docs', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->file_type = 'doc';
            $fileModel->volunteer_id = $req->get('id');
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }
    
    public function picUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('pic', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->file_type = 'pic';
            $fileModel->volunteer_id = $req->get('id');
            $fileModel->save();

            return back()
            ->with('success','Pic has been uploaded.')
            ->with('file', $fileName);
        }
   }
  

}