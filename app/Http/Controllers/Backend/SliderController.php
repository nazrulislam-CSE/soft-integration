<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Image;
use Illuminate\Support\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index',compact('sliders'));
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
            'description_en'=>'required',
            'slider_image'=>'required'
        ]);

        if($request->hasfile('slider_image')){
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1050)->save('upload/slider/'.$name_gen);
            $slider_image = 'upload/slider/'.$name_gen; 
        }else{
            $slider_image = '';
        }

        $slider = new Slider();

        $slider->name_en = $request->name_en;
        $slider->title_en = $request->title_en;
        $slider->url = $request->url;
        $slider->description_en = $request->description_en;
        $slider->button_name_en = $request->button_name_en;

        if($request->status == Null){
            $request->status = 0;
        }
        $slider->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $slider->status = $request->status;

        $slider->slider_image = $slider_image;

        $slider->created_at = Carbon::now();

        $slider->save();

        Session::flash('success','Slider Inserted Successfully');
        return redirect()->route('slider.index');
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

        $slider = Slider::find($id);

        if($request->hasfile('slider_image')){
            try {
                if(file_exists($slider->slider_image)){
                    unlink($slider->slider_image);
                }
            } catch (Exception $e) {
                
            }
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1050)->save('upload/slider/'.$name_gen);
            $slider_image = 'upload/slider/'.$name_gen; 
        }else{
            $slider_image = $slider->slider_image;
        }


        $slider->name_en = $request->name_en;
        $slider->title_en = $request->title_en;
        $slider->url = $request->url;
        $slider->description_en = $request->description_en;
        $slider->button_name_en = $request->button_name_en;
        
        if($request->status == Null){
            $request->status = 0;
        }
        $slider->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $slider->status = $request->status;

        $slider->slider_image = $slider_image;

        $slider->created_at = Carbon::now();

        $slider->save();

        Session::flash('success','Slider Updated Successfully');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        try {
            if(file_exists($slider->slider_image)){
                unlink($slider->slider_image);
            }
        }catch (Exception $e) {
            
        }
        
        $slider->delete();

        Session::flash('success','Slider Parmanently Deleted Successfully.');
        return redirect()->back();
    }

     public function active($id){
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();

        Session::flash('success','Slider Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();

        Session::flash('success','Slider Disabled Successfully.');
        return redirect()->back();
    }
}
