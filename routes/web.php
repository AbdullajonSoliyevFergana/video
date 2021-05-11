<?php

use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

Route::group(['middleware' => ['auth', 'authadmin']], function (){
    Route::resource('/admin', 'VideoController');
    Route::resource('category', 'CategoryController');
    Route::get('/logout', function (){
        session()->flush();
        return redirect()->route('login');
    });
//     Route::get('/admin', 'VideoController@index')->name('admin.index');
// Route::get('admin/create', 'VideoController@create')->name('admin.create');
// Route::get('admin/show/{id}', 'VideoController@show')->name('admin.show');
// Route::get('admin/edit/{id}', 'VideoController@edit')->name('admin.edit');
// Route::post('admin/', 'VideoController@store')->name('admin.store');
// Route::patch('admin/show/{id}', 'VideoController@update')->name('admin.update');
// Route::delete('admin/{id}', 'VideoController@destroy')->name('admin.destroy');
});


//Route::middleware(['auth', 'verified', 'authadmin'])->get('/admin', function (){
//    return view('about');
//});

Route::get('/', function () {
    return view('videos',[
//        'videos' => Video::all(),
        'videos' => Video::latest()->with('category')->get(),
        'categories' => Category::all()
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    return view('videos', [
        'categories' => Category::all(),
        'videos' => $category->videos
    ]);
});

Route::get('videos/{video:slug}', function (Video $video){
    return view('video', [
        'video' => $video
    ]);
});

Route::get('user', function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
