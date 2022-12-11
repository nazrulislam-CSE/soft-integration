<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Carbon;
use Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('backend.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.create');
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
            'name_en'=>'required'
        ]);

        $menu = new Menu();
        $menu->name_en = $request->name_en;

        if($request->status == Null){
            $request->status = 0;
        }

        $menu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $menu->status = $request->status;
        $menu->created_at = Carbon::now();

        $menu->save();

        Session::flash('success','Menu Inserted Successfully');
        return redirect()->route('menu.index');
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
        $this->validate($request,[
            'name_en'=>'required'
        ]);

        $menu = Menu::find($id);
        $menu->name_en = $request->name_en;

        if($request->status == Null){
            $request->status = 0;
        }

        $menu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));
        $menu->status = $request->status;
        $menu->created_at = Carbon::now();

        $menu->save();

        Session::flash('success','Menu Updated Successfully');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        Session::flash('success','Menu Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $menu = Menu::find($id);
        $menu->status = 1;
        $menu->save();

        Session::flash('success','Menu Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $menu = Menu::find($id);
        $menu->status = 0;
        $menu->save();

        Session::flash('success','Menu Disabled Successfully.');
        return redirect()->back();
    }
}
