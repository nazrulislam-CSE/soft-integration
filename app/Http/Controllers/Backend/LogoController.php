<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Carbon;
use Session;
use Image;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = Logo::latest()->get();
        return view('backend.logo.index', compact('logo'));
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

            'logo_image'=>'required'
        ]);

        if($request->hasfile('logo_image')){
            $image = $request->file('logo_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('upload/logo/'.$name_gen);
            $logo_image = 'upload/logo/'.$name_gen;
        }else{
            $logo_image = '';
        }

        $logo = new logo();






        if($request->status == Null){
            $request->status = 0;
        }



        $logo->status = $request->status;

        $logo->logo_image = $logo_image;

        $logo->created_at = Carbon::now();

        $logo->save();

        Session::flash('success','logo Inserted Successfully');
        return redirect()->route('logo.index');

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
        $logo = Logo::find($id);

        if($request->hasfile('logo_image')){
            try {
                if(file_exists($logo->logo_image)){
                    unlink($logo->logo_image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('logo_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(900,900)->save('upload/logo/'.$name_gen);
            $logo_image = 'upload/logo/'.$name_gen;
        }else{
            $logo_image = $logo->logo_image;
        }





        if($request->status == Null){
            $request->status = 0;
        }

      
        $logo->logo_image = $logo_image;
        $logo->created_at = Carbon::now();

        $logo->save();

        Session::flash('success','logo Updated Successfully');
        return redirect()->route('logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Logo::find($id);

        try {
            if(file_exists($logo->logo_image)){
                unlink($logo->logo_image);
            }
        }catch (Exception $e) {

        }

        $logo->delete();

        Session::flash('success','Logo Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $logo = Logo::find($id);
        $logo->status = 1;
        $logo->save();

        Session::flash('success','Logo Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $logo = Logo::find($id);
        $logo->status = 0;
        $logo->save();

        Session::flash('success','Logo Disabled Successfully.');
        return redirect()->back();
    }
}
