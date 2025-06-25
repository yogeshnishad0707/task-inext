<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uploads = Upload::orderBy('id','asc')->get();
        return view('multiplefile',compact('uploads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;die;
        $request->validate([
            'upload.*' => 'required|max:51200|mimes:pdf,docx,xlsx,jpg,jpeg,png,gif',
        ]);

        $multipleimg = [];
        if($request->hasFile('upload')) {
            foreach($request->file('upload') as $value){
                $multimg = time().rand(1000 , 9999).'.'.$value->extension();
                $value->move(public_path('multipleimage/'), $multimg);
                $multipleimg[] = $multimg;
            }
        }
        $uploadimg = implode('|', $multipleimg);
        $uploadfiledata = array_merge($request->except('_token','_method'),['upload'=>$uploadimg]);
        try {
            Upload::create($uploadfiledata);
            return redirect()->back()->with('success', 'File Uploaded Successfully!!');
        } catch (\Exception $ex) {
            return $ex;
            // Log::error($ex);
            return redirect()->back()->with('error', 'File Does Not Uploaded!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upload $upload)
    {
        $uploads = Upload::orderBy('id','asc')->get();
        $edit = Upload::where('id',$upload->id)->first();
        // return $edit;die;
        return view('multiplefile',compact('uploads','edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Upload $upload)
    {
        $request->validate([
            'upload.*' => 'required|max:51200|mimes:pdf,docx,xlsx,jpg,jpeg,png,gif',
        ]);

            //Multiple image updated code
            $multi_image =  Upload::where('id',$upload->id)->pluck('upload')->first();
            $multipleimg = [];
            if(!empty($request['upload'])){
                $existingImages = explode('|', $multi_image);
                foreach($existingImages as $existingimg){
                    $filepath = public_path('multipleimage/' . $existingimg);
                    if(file_exists($filepath)){
                        unlink($filepath);
                    }
                }
                //new multiple image
                foreach($request->file('upload') as $value){
                    $multimg = time().rand(1000 , 9999).'.'.$value->extension();
                    $value->move(public_path('multipleimage/'),$multimg);
                    $multipleimg[] = $multimg;
                }
                $uploadmultimg = implode('|',$multipleimg);
            }else{  
                $uploadmultimg = $multi_image ;
            }


            try {
                Upload::where('id',$upload->id)->update(array_merge($request->except('_token','_method'),
                ['upload'=>$uploadmultimg]
            ));
                return redirect()->route('upload.index')->with('update', 'File Updated Successfully!!');
            } catch (\Exception $ex) {
                //return $ex;
                return redirect()->route('upload.index')->with('error', 'File Does Not Updated!!');
            }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upload $upload)
    {
        //multiple image delete
        $multiple_img =  Upload::where('id',$upload->id)->pluck('upload')->first();
        $files = explode('|',$multiple_img);
        foreach($files as $file){
            if(file_exists(public_path('multipleimage/'.$file))){
                unlink(public_path('multipleimage/'.$file));
            }
        }
        
        try {
            Upload::where('id',$upload->id)->delete();
            return redirect()->route('upload.index')->with('delete', 'Files Deleted Successfully!!');
        } catch (\Exception $ex) {
            //return $ex;
            return redirect()->route('upload.index')->with('error', 'Files Does Not Deleted!!');
        }
    }
}
