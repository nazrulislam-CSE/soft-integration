<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Carbon;
use Session;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        $submenus = Submenu::latest()->get();
        return view('backend.submenu.index', compact('menus','submenus'));
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
            'name_en'=>'required'
        ]);

        $submenu = new Submenu();

        $submenu->menu_id = $request->menu_id;
        $submenu->name_en = $request->name_en;

        if($request->status == Null){
            $request->status = 0;
        }

        $submenu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $submenu->status = $request->status;
        $submenu->created_at = Carbon::now();

        $submenu->save();

        Session::flash('success','Submenu Inserted Successfully');
        return redirect()->route('submenu.index');
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

        $menu = Submenu::find($id);

        $submenu->menu_id = $request->menu_id;
        $submenu->name_en = $request->name_en;

        if($request->status == Null){
            $request->status = 0;
        }

        $submenu->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));
        $submenu->status = $request->status;
        $submenu->created_at = Carbon::now();

        $submenu->save();

        Session::flash('success','Submenu Updated Successfully');
        return redirect()->route('submenu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Submenu::find($id);
        $menu->delete();

        Session::flash('success','SubMenu Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $menu = Submenu::find($id);
        $menu->status = 1;
        $menu->save();

        Session::flash('success','SubMenu Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $menu = Submenu::find($id);
        $menu->status = 0;
        $menu->save();

        Session::flash('success','SubMenu Disabled Successfully.');
        return redirect()->back();
    }
}
