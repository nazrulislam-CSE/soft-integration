<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Page;
use App\Models\Service;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Choose;
use App\Models\About;


class FrontendController extends Controller
{
	/*=================== Start Index Methoed ===================*/
    public function index(Request $request)
    {
    	$menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->latest()->get();
        $tab_menus = Menu::where('status',1)->orderBy('id','DESC')->limit(4)->get();
        $projects = Project::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $teams = Team::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $testimonials = Testimonial::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $blogs = Blog::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $services = Service::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $teams = Team::where('status',1)->orderBy('id','ASC')->limit(1)->get();

    	return view('frontend.index',compact('menus','tab_menus','projects','teams','testimonials','blogs','services','teams'));
    } // end method
    /*=================== End Index Methoed ===================*/

    /*=================== Start Services Methoed ===================*/
    public function services(){
    	$menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $services = Service::where('status',1)->orderBy('id','ASC')->limit(1)->get();
    	return view('frontend.services',compact('menus','services'));
    }
    /*=================== End Services Methoed ===================*/

    /*=================== Start Services Methoed ===================*/
    public function project(){
    	$menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $projects = Project::where('status',1)->orderBy('id','ASC')->limit(1)->get();

    	return view('frontend.project',compact('menus','projects'));
    }
    /*=================== End Services Methoed ===================*/

    /*=================== Start Team Methoed ===================*/
    public function team(){
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $teams = Team::where('status',1)->orderBy('id','ASC')->limit(1)->get();

        return view('frontend.team',compact('menus','teams'));
    }
    /*=================== End Team Methoed ===================*/

    /*=================== Start Blog Methoed ===================*/
    public function blog(){
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $blogs = Blog::where('status',1)->orderBy('id','ASC')->limit(1)->get();

        return view('frontend.blog',compact('menus','blogs'));
    }
    /*=================== End Blog Methoed ===================*/

    /*=================== Start Services Methoed ===================*/
    public function page($slug){
    	$menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
    // 	$section_all = Section::orderBy('created_at','ASC')->where('status','=', 1);

    	$page = Page::where('slug', $slug)->first();
    	return view('frontend.page',compact('menus','page'));
    }
    /*=================== End Services Methoed ===================*/

    /*=================== Start Single Menu Index Methoed ===================*/
    public function menus($slug)
    {
        $chooses = Choose::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $menu_all = Menu::where('slug',$slug)->where('status','=', 1)->first();
        $abouts = About::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $services = Service::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $projects = Project::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $blogs = Blog::where('status',1)->orderBy('id','ASC')->limit(1)->get();
        $teams = Team::where('status',1)->orderBy('id','ASC')->limit(1)->get();

        return view('frontend.menu.index',compact('menus','menu_all','abouts','services','projects','blogs','teams','chooses'));
    } // end method
    /*=================== End Single Menu Index Methoed ===================*/

    /*=================== Start Single Menu Index Methoed ===================*/
    public function submenu(Request $request, $slug)
    {
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $submenu_all = Submenu::where('slug',$slug)->where('status','=', 1)->first();

        return view('frontend.submenu.index',compact('menus','submenu_all'));
    } // end method
    /*=================== End Single Menu Index Methoed ===================*/

    /*=================== Start Services Methoed ===================*/
    public function singleServices($id){
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $services = Service::where('id',$id)->where('status','=', 1)->first();

        return view('frontend.single_services',compact('menus','services'));
    }
    /*=================== End Services Methoed ===================*/

    /*=================== Start Services Methoed ===================*/
    public function singleBlog($id){
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $blogs = Blog::where('id',$id)->where('status','=', 1)->first();

        return view('frontend.single_blog',compact('menus','blogs'));
    }
    /*=================== End Services Methoed ===================*/

    /*=================== Start Services Methoed ===================*/
    public function singleProject($id){
        $menus = Menu::orderBy('created_at','ASC')->where('status','=', 1)->take(7)->get();
        $projects = Project::where('id',$id)->where('status','=', 1)->first();
        
        return view('frontend.single_project',compact('menus','projects'));
    }
    /*=================== End Services Methoed ===================*/
}
