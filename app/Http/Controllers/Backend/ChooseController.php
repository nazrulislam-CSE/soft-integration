<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choose;
use Illuminate\Support\Carbon;
use Session;
use Image;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choose = Choose::latest()->get();
        return view('backend.choose.index', compact('choose'));
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
            'choose_name_en'=>'required',
            'name_en'=>'required',
            'title_en'=>'required',
            'choose_description_en'=>'required',
            'description_en'=>'required',
            'choose_image'=>'required'
        ]);

        if($request->hasfile('choose_image')){
            $image = $request->file('choose_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(140,150)->save('upload/choose/'.$name_gen);
            $choose_image = 'upload/choose/'.$name_gen;
        }else{
            $choose_image = '';
        }

        $choose = new Choose();

        $choose->name_en = $request->name_en;



        $choose->title_en = $request->title_en;
        $choose->description_en = $request->description_en;
        $choose->choose_name_en = $request->choose_name_en;
        $choose->choose_description_en = $request->choose_description_en;


        if($request->status == Null){
            $request->status = 0;
        }
        $choose->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));

        $choose->status = $request->status;

        $choose->choose_image = $choose_image;

        $choose->created_at = Carbon::now();

        $choose->save();



        Session::flash('success','choose Inserted Successfully');
        return redirect()->route('choose.index');

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
        $choose = choose::find($id);

        if($request->hasfile('choose_image')){
            try {
                if(file_exists($choose->slider_image)){
                    unlink($choose->slider_image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('choose_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(140,150)->save('upload/choose/'.$name_gen);
            $choose_image = 'upload/choose/'.$name_gen;
        }else{
            $choose_image =$choose->choose_image;
        }


        $choose->title_en = $request->title_en;
        $choose->description_en = $request->description_en;
        $choose->choose_name_en = $request->choose_name_en;
        $choose->choose_description_en = $request->choose_description_en;


        if($request->status == Null){
            $request->status = 0;
        }
        $choose->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));

        $choose->status = $request->status;
        $choose->choose_image = $choose_image;



        $choose->created_at = Carbon::now();

        $choose->save();

        Session::flash('success','Choose Updated Successfully');
        return redirect()->route('choose.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $choose = Choose::find($id);

        try {
            if(file_exists($choose->choose_image)){
                unlink($choose->choose_image);
            }
        }catch (Exception $e) {

        }

        $choose->delete();

        Session::flash('success','Choose Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $choose = Choose::find($id);
        $choose->status = 1;
        $choose->save();

        Session::flash('success','Choose Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $choose = Choose::find($id);
        $choose->status = 0;
        $choose->save();

        Session::flash('success','Choose Disabled Successfully.');
        return redirect()->back();
    }
}


