<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Robinson Routing 

//(view, controller@method)
Route::get('hello', 'Hello@index');

//Route::get('/hello',function(){
//    return 'Hello World!';
//});

//Parse a paramenter
Route::get('/hello/{name}', 'Hello@show');


//Front
Route::get('/','Front@index');
Route::get('/products','Front@products');
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/categories','Front@product_categories');
Route::get('/products/brands','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::get('/cart','Front@cart');
Route::get('/checkout','Front@checkout');
Route::get('/search/{query}','Front@search');

//Route::get('blade', function () { return view('page'); });
Route::get('blade', function () {
    //return view('page',array('name' => 'The Raven','day' => 'Friday'));
    $drinks = array('Vodka','Gin','Brandy');
    return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks));
});


Route::get('/insert',  function (){
    
    App\Category::create(array('name' => 'Music'));
    return 'Category added';
});

Route::get('/read',  function (){
    $category = new App\Category();
    
    $data = $category->all(array('name', 'id'));
    
    foreach ($data as $list) {
        echo $list->id.' '.$list->name . '<br> ';
    }
    
});

Route::get('/update',  function (){
    $category = App\Category::find(6);
    $category->name = 'HEAVY METAL';
    $category->save();
    
    $data = $category->all(array('name', 'id'));
    
    foreach ($data as $list) {
        echo $list->id.' '.$list->name . '<br>';
    }
    
});

Route::get('/delete',  function (){
    $category = App\Category::find(5);
    $category->delete();
    
    $data = $category->all(array('name', 'id'));
    
    foreach ($data as $list) {
        echo $list->id.' '.$list->name . '<br>';
    }
    
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});



