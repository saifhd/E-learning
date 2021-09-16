<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseCategoriesController;
use App\Http\Controllers\Admin\CourseSubCategoriesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SectionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\CoursesController;

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CoursesController as FrontendCoursesController;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Middleware;

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


Route::get('/', function () {
    // $sec=(int)150;
    // dd (CarbonInterval::seconds($sec)->cascade());
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//--------------------------------------------Admin Routes------------------------------------------------------------------
//Manage Users Routes
Route::group(['prefix'=>'manage/users','as'=>'manage.users.', 'Middleware'=>'auth'],function(){
    Route::get('/trashes', [UsersController::class, 'trashes'])->name('trashed');
    Route::get('/trashes/{user}/restore', [UsersController::class, 'restore'])->name('restore');
    Route::delete('/trashes/{user}', [UsersController::class, 'forceDelete'])->name('forcedelete');

    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/{user}', [UsersController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UsersController::class, 'update'])->name('update');
    Route::delete('/{user}', [UsersController::class, 'destroy'])->name('destroy');
    Route::put('/{user}/avatar', [UsersController::class, 'avatar'])->name('avarar');
});

Route::group(['prefix'=>'manage','as'=>'manage.','middleware'=>['auth','admin']],function(){
    //Roles and Permission Routes
    Route::resource('/roles', RolesController::class);
    Route::get('/permissions',[PermissionsController::class,'index'])->name('permissions.index');

    //Blog Category Routes
    Route::resource('/categories', CategoryController::class);

    //Blog Posts Routes
    Route::resource('/posts', PostsController::class);
    //Course Categories
    Route::resource('/course-categories',CourseCategoriesController::class);

    //Course Sub Categories
    Route::resource('/course-sub-categories', CourseSubCategoriesController::class);


    //Courses Controller
    Route::resource('courses', CoursesController::class);
    Route::get('/my-courses',[CoursesController::class,'myCourses'])->name('my-courses');
     //Course Sections
    Route::resource('courses/{course}/sections',SectionsController::class);


    //Course ->Section Videos
    Route::resource('sections/{section}/videos', VideosController::class);
    Route::Post('/videos/upload/{id}', [VideosController::class,'videoUpload'])->name('videos.upload');
    Route::get('/videos/show/{id}', [VideosController::class, 'show_video']);
    Route::post('section/{section}/videos/update/order', [VideosController::class, 'order'])->name('videos.order');


});

//--------------------------------------------End of Admin Routes-----------------------------------------------------------

//---------------------------------------------Start FrontEnd -------------------------------------------------------------
//Blog Routes
Route::get('blog/posts',[BlogController::class,'index'])->name('front.posts.index');
Route::get('blog/posts/{post}',[BlogController::class,'show'])->name('front.posts.show');

//Courses Routes
Route::get('courses',[FrontendCoursesController::class,'index'])->name('front.courses.index');
Route::get('courses/{course}', [FrontendCoursesController::class, 'show'])->name('front.courses.show');
Route::post('courses/{course}/reviews', [FrontendCoursesController::class, 'store_reviews'])->name('front.courses.reviews.store');







