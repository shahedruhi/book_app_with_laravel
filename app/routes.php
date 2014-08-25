<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('/products', function()
{
    return View::make('products.index');
});

Route::post('/products', function()
{
    //var_dump(input::file('image'));
    //var_dump(input::get('title'));

    //get image
    $image = Input::file('image');
    //image name
    $filename = $image->getClientOriginalName();

    $file_path = Input::file('image')->move(__DIR__.'/storage/',Input::file('image')->getClientOriginalName());

    //instantiate new product model
    $product = new Product;
    $product->title = Input::get('title');
    $product->image = $filename;
    $product->file_path = $file_path;

    //var_dump($product);
    $saveflag = $product->save();
    if($saveflag){
        return 'Product image Moved to path = "/var/www/html/book/app/storage" & product added to database';
    }


});


Route::get('form', function(){
    return View::make('form');
});

Route::any('form-submit', function(){
    return Input::file('file')->move(__DIR__.'/storage/',Input::file('file')->getClientOriginalName());
});

//Route::get('/upload', 'ImageController@getUploadForm');
//Route::post('/upload/image','ImageController@postUpload');

Route::resource('books','BookController');



//Route::controller('/', 'BookController');