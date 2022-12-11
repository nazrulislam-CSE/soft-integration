<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Carbon;
use Session;
use Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        $menus = Menu::latest()->get();
        $submenus = Submenu::latest()->get();

        return view('backend.services.index', compact('services','menus','submenus'));
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
            'service_image'=>'required'
        ]);

        if($request->hasfile('service_image')){
            $image = $request->file('service_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,335)->save('upload/services/'.$name_gen);
            $service_image = 'upload/services/'.$name_gen; 
        }else{
            $service_image = '';
        }

        $service = new Service();

        $service->menu_id = $request->menu_id;
        $service->submenu_id = $request->submenu_id;

        $service->name_en = $request->name_en;
        $service->service_name_en = $request->service_name_en;
        $service->title_en = $request->title_en;
        $service->service_description_en = $request->service_description_en;
        $service->service_button_en = $request->service_button_en;

        if($request->status == Null){
            $request->status = 0;
        }
        $service->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $service->status = $request->status;

        $service->service_image = $service_image;

        $service->created_at = Carbon::now();

        $service->save();

        Session::flash('success','Services Inserted Successfully');
        return redirect()->route('services.index');

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
        $service = Service::find($id);

        if($request->hasfile('service_image')){
            try {
                if(file_exists($service->service_image)){
                    unlink($service->service_image);
                }
            } catch (Exception $e) {
                
            }
            $image = $request->file('service_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,335)->save('upload/services/'.$name_gen);
            $service_image = 'upload/services/'.$name_gen; 
        }else{
            $service_image = $service->service_image;
        }

        $service->menu_id = $request->menu_id;
        $service->submenu_id = $request->submenu_id;

        $service->name_en = $request->name_en;
        $service->service_name_en = $request->service_name_en;
        $service->title_en = $request->title_en;
        $service->service_description_en = $request->service_description_en;
        $service->service_button_en = $request->service_button_en;

        if($request->status == Null){
            $request->status = 0;
        }
        $service->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $service->status = $request->status;

        $service->service_image = $service_image;

        $service->save();

        Session::flash('success','Services Updated Successfully');
        return redirect()->route('services.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        try {
            if(file_exists($service->service_image)){
                unlink($service->service_image);
            }
        }catch (Exception $e) {
            
        }
        
        $service->delete();

        Session::flash('success','Services Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $service = Service::find($id);
        $service->status = 1;
        $service->save();

        Session::flash('success','Service Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $service = Service::find($id);
        $service->status = 0;
        $service->save();

        Session::flash('success','Sservice Disabled Successfully.');
        return redirect()->back();
    }
}
