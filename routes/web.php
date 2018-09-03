<?php

// DB::listen(function($query){
//     echo "<pre>{$query->sql}</pre>";
// });

Route::get('/', function () {
    return redirect()->route('blog');
});

Auth::routes();

Route::get('blog', 'Blog\PagesController@blog')->name('blog');
Route::get('post/{slug}', 'Blog\PagesController@post')->name('post');
Route::get('categoria/{slug}', 'Blog\PagesController@categoria')->name('categoria');
Route::get('etiqueta/{slug}', 'Blog\PagesController@etiqueta')->name('etiqueta');
