<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Menu;
use Illuminate\Support\Carbon;
use Session;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::latest()->get();
        $menus = Menu::latest()->get();
        return view('backend.blog.index', compact('blog','menus'));
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
            'blog_name_en'=>'required',
            'name_en'=>'required',
            'title_en'=>'required',
            'blog_description_en'=>'required',
            'button_name_en'=>'required',
            'blog_date'=>'required',
            'blog_image'=>'required'
        ]);

        if($request->hasfile('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(344,212)->save('upload/blog/'.$name_gen);
            $blog_image = 'upload/blog/'.$name_gen;
        }else{
            $blog_image = '';
        }

        $blog = new Blog();

        $blog->menu_id = $request->menu_id;

        $blog->name_en = $request->name_en;
        $blog->title_en = $request->title_en;
        $blog->blog_name_en = $request->blog_name_en;
        $blog->blog_description_en = $request->blog_description_en;
        $blog->button_name_en = $request->button_name_en;

        if($request->status == Null){
            $request->status = 0;
        }
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));

        $blog->blog_date = $request->blog_date;
        $blog->status = $request->status;

        $blog->blog_image = $blog_image;

        $blog->created_at = Carbon::now();

        $blog->save();



        Session::flash('success','Blog Inserted Successfully');
        return redirect()->route('blog.index');

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
        $blog = Blog::find($id);

        if($request->hasfile('blog_image')){
            try {
                if(file_exists($blog->slider_image)){
                    unlink($blog->slider_image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(344,212)->save('upload/blog/'.$name_gen);
            $blog_image = 'upload/blog/'.$name_gen;
        }else{
            $blog_image = $blog->blog_image;
        }

        $blog->menu_id = $request->menu_id;


        $blog->name_en = $request->name_en;
        $blog->title_en = $request->title_en;
        $blog->blog_name_en = $request->blog_name_en;
        $blog->blog_description_en = $request->blog_description_en;
        $blog->button_name_en = $request->button_name_en;

        if($request->status == Null){
            $request->status = 0;
        }
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));
        $blog->blog_date = $request->blog_date;
        $blog->status = $request->status;
        $blog->blog_image = $blog_image;

      

        $blog->created_at = Carbon::now();

        $blog->save();

        Session::flash('success','Blog Updated Successfully');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        try {
            if(file_exists($blog->blog_image)){
                unlink($blog->blog_image);
            }
        }catch (Exception $e) {

        }

        $blog->delete();

        Session::flash('success','Blog Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();

        Session::flash('success','Blog Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();

        Session::flash('success','Blog Disabled Successfully.');
        return redirect()->back();
    }
}


