<?php


Route::get('/',['as' => 'front.home', 'uses' => 'Front\HomeController@index']);

Route::prefix('/image')->group(function () {
    Route::post('/upload', ['as' => 'upload.image', 'uses' => 'ImageController@upload_image']);
    Route::post('/delete', ['as' => 'delete.image', 'uses' => 'ImageController@delete_image']);
    Route::get('/{size}/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getPublicImage']);
    Route::get('/limit/{size}/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getImageResize']);
    Route::get('/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getDefaultImage']);
});


