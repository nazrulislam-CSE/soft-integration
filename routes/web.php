<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\SubmenuController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServicesController;

use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ChooseController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\EmailController;
use App\Http\Controllers\Backend\SubscribeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




/*================== Frontend All Route ==============*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/services/details', [FrontendController::class, 'services'])->name('services.details');
Route::get('/projects/details', [FrontendController::class, 'project'])->name('projects.details');
Route::get('/team/details', [FrontendController::class, 'team'])->name('team.details');
Route::get('/blog/details', [FrontendController::class, 'blog'])->name('blog.details');
Route::get('/pages/{slug}', [FrontendController::class, 'page'])->name('page.all');

Route::get('/single-services/{id}', [FrontendController::class, 'singleServices'])->name('single.services');
Route::get('/single-blog/{id}', [FrontendController::class, 'singleBlog'])->name('single.blog');
Route::get('/single-project/{id}', [FrontendController::class, 'singleProject'])->name('single.project');

// single menu page show //
Route::get('/page/{slug}', [FrontendController::class, 'menus'])->name('menu.show.index');
Route::get('/pag/{slug}', [FrontendController::class, 'submenu'])->name('submenu.show.index');



/*================== Backend Admin All Routes ==============*/
Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
	Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
	Route::get('/logout',[AdminController::class, 'AminLogout'])->name('admin.logout');
});

Route::prefix('menu')->group(function(){
	Route::get('/index', [MenuController::class, 'index'])->name('menu.index');
	Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
	Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
	Route::post('/menu-update/{id}', [MenuController::class, 'update'])->name('menu.update');
	Route::get('/menu-active/{id}', [MenuController::class, 'active'])->name('menu.active');
	Route::get('/menu-inactive/{id}', [MenuController::class, 'inactive'])->name('menu.in_active');
	Route::get('/menu-delete/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
});

Route::prefix('submenu')->group(function(){
	Route::get('/index', [SubmenuController::class, 'index'])->name('submenu.index');
	Route::get('/create', [SubmenuController::class, 'create'])->name('submenu.create');
	Route::post('/store', [SubmenuController::class, 'store'])->name('submenu.store');
	Route::post('/submenu-update/{id}', [SubmenuController::class, 'update'])->name('submenu.update');
	Route::get('/submenu-active/{id}', [SubmenuController::class, 'active'])->name('submenu.active');
	Route::get('/submenu-inactive/{id}', [SubmenuController::class, 'inactive'])->name('submenu.in_active');
	Route::get('/submenu-delete/{id}', [SubmenuController::class, 'destroy'])->name('submenu.delete');
});

Route::prefix('about')->group(function(){
	Route::get('/index', [AboutController::class, 'index'])->name('about.index');
	Route::get('/create', [AboutController::class, 'create'])->name('about.create');
	Route::post('/store', [AboutController::class, 'store'])->name('about.store');
	Route::post('/about-update/{id}', [AboutController::class, 'update'])->name('about.update');
	Route::get('/about-active/{id}', [AboutController::class, 'active'])->name('about.active');
	Route::get('/about-inactive/{id}', [AboutController::class, 'inactive'])->name('about.in_active');
	Route::get('/about-delete/{id}', [AboutController::class, 'destroy'])->name('about.delete');
});

Route::prefix('services')->group(function(){
	Route::get('/index', [ServicesController::class, 'index'])->name('services.index');
	Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
	Route::post('/store', [ServicesController::class, 'store'])->name('services.store');
	Route::post('/services-update/{id}', [ServicesController::class, 'update'])->name('services.update');
	Route::get('/services-active/{id}', [ServicesController::class, 'active'])->name('services.active');
	Route::get('/services-inactive/{id}', [ServicesController::class, 'inactive'])->name('services.in_active');
	Route::get('/services-delete/{id}', [ServicesController::class, 'destroy'])->name('services.delete');
});
Route::prefix('choose')->group(function(){
	Route::get('/index', [ChooseController::class, 'index'])->name('choose.index');
	Route::get('/create', [ChooseController::class, 'create'])->name('choose.create');
	Route::post('/store', [ChooseController::class, 'store'])->name('choose.store');
	Route::post('/choose-update/{id}', [ChooseController::class, 'update'])->name('choose.update');
	Route::get('/choose-active/{id}', [ChooseController::class, 'active'])->name('choose.active');
	Route::get('/choose-inactive/{id}', [ChooseController::class, 'inactive'])->name('choose.in_active');
	Route::get('/choose-delete/{id}', [ChooseController::class, 'destroy'])->name('choose.delete');
});

Route::prefix('logo')->group(function(){
	Route::get('/index', [LogoController::class, 'index'])->name('logo.index');
	Route::get('/create', [LogoController::class, 'create'])->name('logo.create');
	Route::post('/store', [LogoController::class, 'store'])->name('logo.store');
	Route::post('/logo-update/{id}', [LogoController::class, 'update'])->name('logo.update');
	Route::get('/logo-active/{id}', [LogoController::class, 'active'])->name('logo.active');
	Route::get('/logo-inactive/{id}', [LogoController::class, 'inactive'])->name('logo.in_active');
	Route::get('/logo-delete/{id}', [LogoController::class, 'destroy'])->name('logo.delete');
});
Route::prefix('blog')->group(function(){
	Route::get('/index', [BlogController::class, 'index'])->name('blog.index');
	Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
	Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
	Route::post('/blog-update/{id}', [BlogController::class, 'update'])->name('blog.update');
	Route::get('/blog-active/{id}', [BlogController::class, 'active'])->name('blog.active');
	Route::get('/blog-inactive/{id}', [BlogController::class, 'inactive'])->name('blog.in_active');
	Route::get('/blog-delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
});

Route::prefix('profile')->group(function(){
	Route::get('/index', [UserController::class, 'index'])->name('my.profile');
    Route::post('/profile/edit/{id}',[UserController::class,'updateProfile'])->name('update.profile');
    Route::get('/password/change',[UserController::class,'ChangePassword'])->name('password.change');
    Route::post('user/password/update',[UserController::class,'UserPasswordUpdate'])->name('user.password.update');

});

Route::prefix('sliders')->group(function(){
	Route::get('/index', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/store',[SliderController::class,'store'])->name('slider.store');
    Route::post('/update/{id}',[SliderController::class,'update'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class,'destroy'])->name('slider.delete');
    Route::get('/slider-active/{id}', [SliderController::class, 'active'])->name('slider.active');
	Route::get('/slider-inactive/{id}', [SliderController::class, 'inactive'])->name('slider.in_active');

});

Route::prefix('project')->group(function(){
	Route::get('/index', [ProjectController::class, 'index'])->name('project.index');
	Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
	Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
	Route::post('/project-update/{id}', [ProjectController::class, 'update'])->name('project.update');
	Route::get('/project-active/{id}', [ProjectController::class, 'active'])->name('project.active');
	Route::get('/project-inactive/{id}', [ProjectController::class, 'inactive'])->name('project.in_active');
	Route::get('/project-delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');

});

Route::prefix('testimonial')->group(function(){
	Route::get('/index', [TestimonialController::class, 'index'])->name('testimonial.index');
	Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
	Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');
	Route::post('/testimonial-update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
	Route::get('/testimonial-active/{id}', [TestimonialController::class, 'active'])->name('testimonial.active');
	Route::get('/testimonial-inactive/{id}', [TestimonialController::class, 'inactive'])->name('testimonial.in_active');
	Route::get('/testimonial-delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');
});

Route::prefix('team')->group(function(){
	Route::get('/index', [TeamController::class, 'index'])->name('team.index');
	Route::get('/create', [TeamController::class, 'create'])->name('team.create');
	Route::post('/store', [TeamController::class, 'store'])->name('team.store');
	Route::post('/team-update/{id}', [TeamController::class, 'update'])->name('team.update');
	Route::get('/team-active/{id}', [TeamController::class, 'active'])->name('team.active');
	Route::get('/team-inactive/{id}', [TeamController::class, 'inactive'])->name('team.in_active');
	Route::get('/team-delete/{id}', [TeamController::class, 'destroy'])->name('team.delete');
});

Route::prefix('setting')->group(function(){
	Route::get('/index', [SettingController::class, 'index'])->name('setting.index');
	Route::post('/update', [SettingController::class, 'update'])->name('update.setting');
});

Route::prefix('seo')->group(function(){
	Route::get('/index', [SeoController::class, 'index'])->name('seo.index');
	Route::post('/update', [SeoController::class, 'update'])->name('seo.update');
});


Route::prefix('pageses')->group(function(){
	Route::get('/index', [PageController::class, 'index'])->name('page.index');
	Route::get('/create', [PageController::class, 'create'])->name('page.create');
	Route::post('/store', [PageController::class, 'store'])->name('page.store');
	Route::post('/page-update/{id}', [PageController::class, 'update'])->name('page.update');
	Route::get('/page-active/{id}', [PageController::class, 'active'])->name('page.active');
	Route::get('/page-inactive/{id}', [PageController::class, 'inactive'])->name('page.in_active');
	Route::get('/page-delete/{id}', [PageController::class, 'destroy'])->name('page.delete');
});


Route::prefix('message')->group(function(){
	// email send //
	Route::post('/send', [EmailController::class, 'store'])->name('send.email');
	Route::get('/index',[EmailController::class, 'index'])->name('message.index');
	Route::get('/page-active/{id}', [EmailController::class, 'active'])->name('message.active');
	Route::get('/message-inactive/{id}', [EmailController::class, 'inactive'])->name('message.in_active');
	Route::get('/message-delete/{id}', [EmailController::class, 'destroy'])->name('message.delete');
});

Route::prefix('subscribes')->group(function(){

	Route::get('/index', [SubscribeController::class, 'index'])->name('subscribe.index');
	Route::post('/store', [SubscribeController::class, 'store'])->name('subscribe.store');
	Route::get('/subscribe-delete/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.delete');
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
