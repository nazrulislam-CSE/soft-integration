<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Submenu;
use Illuminate\Support\Carbon;
use Session;
use Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->get();
        $submenus = Submenu::latest()->get();
        return view('backend.team.index', compact('teams','submenus'));
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
            'team_name_en'=>'required',
            'title_en'=>'required',
            'description_en'=>'required',
            'designation_en'=>'required',
            'team_image'=>'required'
        ]);

        if($request->hasfile('team_image')){
            $image = $request->file('team_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(257,290)->save('upload/team/'.$name_gen);
            $team_image = 'upload/team/'.$name_gen;
        }else{
            $team_image = '';
        }

        $team = new Team();
        
        $team->submenu_id = $request->submenu_id;

        $team->title_en = $request->title_en;
        $team->description_en = $request->description_en;
        $team->team_name_en = $request->team_name_en;
        $team->designation_en = $request->designation_en;


        if($request->status == Null){
            $request->status = 0;
        }

        $team->facebook = $request->facebook;
        $team->github = $request->github;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;

        $team->status = $request->status;

        $team->team_image = $team_image;

        $team->created_at = Carbon::now();

        $team->save();

        Session::flash('success','Team Inserted Successfully');
        return redirect()->route('team.index');
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
        $team = Team::find($id);

        if($request->hasfile('team_image')){
            try {
                if(file_exists($team->team_image)){
                    unlink($team->team_image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('team_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(257,290)->save('upload/team/'.$name_gen);
            $team_image = 'upload/team/'.$name_gen;
        }else{
            $team_image = $team->team_image;
        }
        
        $team->submenu_id = $request->submenu_id;

        $team->title_en = $request->title_en;
        $team->description_en = $request->description_en;
        $team->team_name_en = $request->team_name_en;
        $team->designation_en = $request->designation_en;


        if($request->status == Null){
            $request->status = 0;
        }

        $team->facebook = $request->facebook;
        $team->github = $request->github;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;

        $team->status = $request->status;

        $team->team_image = $team_image;

        $team->status = $request->status;

   

        $team->created_at = Carbon::now();

        $team->save();

        Session::flash('success','Team Updated Successfully');
        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);

        try {
            if(file_exists($team->team_image)){
                unlink($team->team_image);
            }
        }catch (Exception $e) {

        }

        $team->delete();

        Session::flash('success','Team Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $team = Team::find($id);
        $team->status = 1;
        $team->save();

        Session::flash('success','Team Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $team = Team::find($id);
        $team->status = 0;
        $team->save();

        Session::flash('success','Team Disabled Successfully.');
        return redirect()->back();
    }
}
