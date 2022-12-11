<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Carbon;
use Session;
use Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en'=>'required',
            'title_en'=>'required',
            'about_image'=>'required',
            'description_en'=>'required'
        ]);

        if($request->hasfile('about_image')){
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(448,310)->save('upload/about/'.$name_gen);
            $about_image = 'upload/about/'.$name_gen; 
        }else{
            $about_image = '';
        }

        $about = new About();

        $about->name_en = $request->name_en;
        $about->title_en = $request->title_en;
        $about->description_en = $request->description_en;
        $about->button_name_en = $request->button_name_en;

        if($request->status == Null){
            $request->status = 0;
        }
        $about->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));

        $about->status = $request->status;
        $about->about_image = $about_image;
        $about->created_at = Carbon::now();

        $about->save();

        Session::flash('success','About Inserted Successfully');
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = About::find($id);

        if($request->hasfile('about_image')){
            try {
                if(file_exists($about->about_image)){
                    unlink($about->about_image);
                }
            } catch (Exception $e) {
                
            }
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(448,310)->save('upload/about/'.$name_gen);
            $about_image = 'upload/about/'.$name_gen; 
        }else{
            $about_image = '';
        }

       
       
        $about->name_en = $request->name_en;
        $about->title_en = $request->title_en;
        $about->description_en = $request->description_en;
        $about->button_name_en = $request->button_name_en;
        
        if($request->status == Null){
            $request->status = 0;
        }
        $about->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));

        $about->status = $request->status;
   

        $about->save();

        Session::flash('success','About Updated Successfully');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);

        try {
            if(file_exists($about->about_image)){
                unlink($about->about_image);
            }
        }catch (Exception $e) {
            
        }


        $about->delete();

        Session::flash('success','About Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $about = About::find($id);
        $about->status = 1;
        $about->save();

        Session::flash('success','About Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $about = About::find($id);
        $about->status = 0;
        $about->save();

        Session::flash('success','About Disabled Successfully.');
        return redirect()->back();
    }
}
