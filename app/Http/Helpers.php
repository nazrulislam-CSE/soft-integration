<?php

use App\Models\Setting;
use App\Models\Section;
use App\Models\Page;
use App\Models\Menu;
use Illuminate\Support\Collection;

// Setting page // 
if (!function_exists('get_setting')) {

    function get_setting($name)
    {
        return Setting::where('name', $name)->first();
    }
}

// Search By Side All Categories // 
if (!function_exists('get_all_menu')) {
    function get_all_menu($slug)
    {
        $menu = Menu::where('slug',$slug)->where('status','=', 1)->first();
        return $menu;
    }
}
//Footer page Bottom //
if (!function_exists('get_pages_both_footer')) {
    function get_pages_both_footer()
    {
        return Page::where('status',1)
                ->where('position','Both')
                ->orWhere('position','Bottom')
                ->orderBy('id','ASC')
                ->get();
    }
}

//Navber Top page  //
if (!function_exists('get_pages_top_footer')) {
    function get_pages_top_footer()
    {
        return Page::where('status',1)
                ->where('position','Nav')
                ->orderBy('id','ASC')
                ->get();
    }
}
//Footer page
if (!function_exists('get_footer_banner')) {
    function get_footer_banner()
    {
        return Banner::where('status',1)
                ->where('position',0)
                ->orderBy('id','DESC')
                ->first();
    }
}