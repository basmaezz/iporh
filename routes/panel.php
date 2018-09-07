<?php

Route::get('/', ['as' => 'panel', 'uses' => 'PanelLoginController@index']);
Route::get('/login', ['as' => 'panel.login', 'uses' => 'PanelLoginController@showLoginForm']);
Route::post('/login', ['as' => 'panel.login.post', 'uses' => 'PanelLoginController@login']);
Route::get('/dashboard', ['as' => 'panel.dashboard', 'uses' => 'HomeController@index']);
Route::post('/logout', 'HomeController@logout');
Route::prefix('/album')->group(function () {
    Route::prefix('/categories')->group(function () {
        Route::get('/', ['as' => 'panel.album.categories', 'uses' => 'PhotoAlbumController@categories']);
        Route::post('/create', ['as' => 'panel.album.categories.store', 'uses' => 'PhotoAlbumController@store_category']);
        Route::post('/edit/{id}', ['as' => 'panel.album.categories.edit', 'uses' => 'PhotoAlbumController@edit_category']);
        Route::delete('/delete/{id}', ['as' => 'panel.album.categories.delete', 'uses' => 'PhotoAlbumController@delete_category']);
        Route::get('/data/{id}', ['as' => 'panel.album.categories.item', 'uses' => 'PhotoAlbumController@get_category_data']);
        Route::get('/data', ['as' => 'panel.album.categories.data', 'uses' => 'PhotoAlbumController@categories_data']);
    });
    Route::get('/all', ['as' => 'panel.album.all', 'uses' => 'PhotoAlbumController@index']);
    Route::get('/all/data', ['as' => 'panel.album.all.data', 'uses' => 'PhotoAlbumController@get_data_table']);
    Route::delete('/delete/{album}', ['as' => 'panel.album.delete', 'uses' => 'PhotoAlbumController@delete']);
    Route::prefix('/create')->group(function () {
        Route::get('/', ['as' => 'panel.album.create', 'uses' => 'PhotoAlbumController@create']);
        Route::post('/', ['as' => 'panel.album.create', 'uses' => 'PhotoAlbumController@store']);
    });
    Route::prefix('/edit')->group(function () {
        Route::get('/{album}', ['as' => 'panel.album.edit', 'uses' => 'PhotoAlbumController@edit']);
        Route::put('/{album}', ['as' => 'panel.album.edit', 'uses' => 'PhotoAlbumController@update']);
    });
});
Route::prefix('/post')->group(function () {
    Route::prefix('/categories')->group(function () {
        Route::get('/', ['as' => 'panel.post.categories', 'uses' => 'PostController@categories']);
        Route::post('/create', ['as' => 'panel.post.categories.store', 'uses' => 'PostController@store_category']);
        Route::post('/edit/{id}', ['as' => 'panel.post.categories.edit', 'uses' => 'PostController@edit_category']);
        Route::delete('/delete/{id}', ['as' => 'panel.post.categories.delete', 'uses' => 'PostController@delete_category']);
        Route::get('/data/{id}', ['as' => 'panel.post.categories.item', 'uses' => 'PostController@get_category_data']);
        Route::get('/data', ['as' => 'panel.post.categories.data', 'uses' => 'PostController@categories_data']);
    });
    Route::get('/all', ['as' => 'panel.post.all', 'uses' => 'PostController@index']);
    Route::get('/all/data', ['as' => 'panel.post.all.data', 'uses' => 'PostController@get_data_table']);
    Route::delete('/delete/{album}', ['as' => 'panel.post.delete', 'uses' => 'PostController@delete']);
    Route::prefix('/create')->group(function () {
        Route::get('/', ['as' => 'panel.post.create', 'uses' => 'PostController@create']);
        Route::post('/', ['as' => 'panel.post.create', 'uses' => 'PostController@store']);
    });
    Route::prefix('/edit')->group(function () {
        Route::get('/{album}', ['as' => 'panel.post.edit', 'uses' => 'PostController@edit']);
        Route::put('/{album}', ['as' => 'panel.post.edit', 'uses' => 'PostController@update']);
    });
});
Route::prefix('/project')->group(function () {
    Route::get('/all', ['as' => 'panel.project.all', 'uses' => 'ProjectController@index']);
    Route::get('/all/data', ['as' => 'panel.project.all.data', 'uses' => 'ProjectController@get_data_table']);
    Route::delete('/delete/{album}', ['as' => 'panel.project.delete', 'uses' => 'ProjectController@delete']);
    Route::prefix('/create')->group(function () {
        Route::get('/', ['as' => 'panel.project.create', 'uses' => 'ProjectController@create']);
        Route::post('/', ['as' => 'panel.project.create', 'uses' => 'ProjectController@store']);
    });
    Route::prefix('/edit')->group(function () {
        Route::get('/{album}', ['as' => 'panel.project.edit', 'uses' => 'ProjectController@edit']);
        Route::put('/{album}', ['as' => 'panel.project.edit', 'uses' => 'ProjectController@update']);
    });
});

Route::prefix('/service')->group(function () {
    Route::get('/all', ['as' => 'panel.service.all', 'uses' => 'ServiceController@index']);
    Route::get('/all/data', ['as' => 'panel.service.all.data', 'uses' => 'ServiceController@get_data_table']);
    Route::delete('/delete/{service}', ['as' => 'panel.service.delete', 'uses' => 'ServiceController@delete']);
    Route::prefix('/create')->group(function () {
        Route::get('/', ['as' => 'panel.service.create', 'uses' => 'ServiceController@create']);
        Route::post('/', ['as' => 'panel.service.create', 'uses' => 'ServiceController@store']);
    });
    Route::prefix('/edit')->group(function () {
        Route::get('/{service}', ['as' => 'panel.service.edit', 'uses' => 'ServiceController@edit']);
        Route::put('/{service}', ['as' => 'panel.service.edit', 'uses' => 'ServiceController@update']);
    });
});
Route::prefix('/advertisement')->group(function () {
    Route::get('/all', ['as' => 'panel.advertisement.all', 'uses' => 'AdvertisementController@index']);
    Route::get('/all/data', ['as' => 'panel.advertisement.all.data', 'uses' => 'AdvertisementController@get_data_table']);
    Route::delete('/delete/{advertisement}', ['as' => 'panel.advertisement.delete', 'uses' => 'AdvertisementController@delete']);
    Route::prefix('/create')->group(function () {
        Route::get('/', ['as' => 'panel.advertisement.create', 'uses' => 'AdvertisementController@create']);
        Route::post('/', ['as' => 'panel.advertisement.create', 'uses' => 'AdvertisementController@store']);
    });
    Route::prefix('/edit')->group(function () {
        Route::get('/{advertisement}', ['as' => 'panel.advertisement.edit', 'uses' => 'AdvertisementController@edit']);
        Route::put('/{advertisement}', ['as' => 'panel.advertisement.edit', 'uses' => 'AdvertisementController@update']);
    });
});

Route::prefix('/inbox/')->group(function () {
    Route::get('/all', 'InboxController@index')->name('panel.inbox.all');
    Route::get('/view/{id}', 'InboxController@view_msg')->name('panel.inbox.view');
    Route::post('/replay-msg', 'InboxController@replay_msg')->name('panel.inbox.replay');
    Route::delete('/delete/{id}', 'InboxController@delete_msg')->name('panel.inbox.delete');
    Route::post('/delete', 'InboxController@delete')->name('panel.inbox.delete-group');
});
Route::prefix('/sponsors/')->group(function () {
    Route::get('/', ['as' => 'panel.sponsors.index', 'uses' => 'SponsorController@index']);
    Route::post('/create', ['as' => 'panel.sponsors.create', 'uses' => 'SponsorController@store']);
    Route::post('/edit/{id}', ['as' => 'panel.sponsors.edit', 'uses' => 'SponsorController@edit']);
    Route::get('/data/{id}', ['as' => 'panel.sponsors.item', 'uses' => 'SponsorController@get_item_data']);
    Route::get('/data', ['as' => 'panel.sponsors.data', 'uses' => 'SponsorController@all_data_table']);
    Route::delete('/delete/{id}', ['as' => 'panel.sponsors.delete', 'uses' => 'SponsorController@delete']);
});

Route::prefix('/donation')->group(function () {
    Route::get('/all', ['as' => 'panel.donation.all', 'uses' => 'DonationController@index']);
    Route::get('/all/data', ['as' => 'panel.donation.all.data', 'uses' => 'DonationController@get_data_table']);
    Route::get('/show/{donation}', ['as' => 'panel.donation.show', 'uses' => 'DonationController@show']);
});


Route::prefix('/settings')->group(function () {
    Route::prefix('/website')->group(function () {
        Route::get('/', ['as' => 'panel.settings.website', 'uses' => 'TemplateController@settings']);
        Route::put('/', ['as' => 'panel.settings.website', 'uses' => 'TemplateController@update_settings']);
    });

    Route::prefix('/socials')->group(function () {
        Route::get('/', ['as' => 'panel.settings.socials', 'uses' => 'TemplateController@socials']);
        Route::put('/', ['as' => 'panel.settings.socials', 'uses' => 'TemplateController@update_socials']);
    });
});

Route::prefix('/template')->group(function () {

    Route::prefix('/faq')->group(function () {
        Route::get('/', ['as' => 'panel.template.faq', 'uses' => 'TemplateController@faq']);
    });


    Route::prefix('/contribute')->group(function () {
        Route::get('/', ['as' => 'panel.template.contribute', 'uses' => 'TemplateController@contribute']);
    });

    Route::prefix('/donate_tmp')->group(function () {
        Route::get('/', ['as' => 'panel.template.donation', 'uses' => 'TemplateController@donation']);
    });

    Route::prefix('/about')->group(function () {
        Route::get('/', ['as' => 'panel.template.about', 'uses' => 'TemplateController@about']);
        Route::prefix('/section')->group(function () {
            Route::post('/create', ['as' => 'panel.about.section.store', 'uses' => 'TemplateController@store_section']);
            Route::post('/edit/{id}', ['as' => 'panel.about.section.edit', 'uses' => 'TemplateController@edit_section']);
            Route::get('/data/{id}', ['as' => 'panel.about.section.item', 'uses' => 'TemplateController@get_section_data']);
            Route::delete('/delete/{id}', ['as' => 'panel.about.section.delete', 'uses' => 'TemplateController@delete_section']);
        });
    });
    Route::prefix('/slider')->group(function () {
        Route::get('/', ['as' => 'panel.template.slider', 'uses' => 'TemplateController@slider']);
        Route::prefix('/section')->group(function () {
            Route::post('/edit/{id}', ['as' => 'panel.slider.section.edit', 'uses' => 'TemplateController@edit_section']);
            Route::get('/data/{id}', ['as' => 'panel.slider.section.item', 'uses' => 'TemplateController@get_section_data']);
        });
    });
});

//});


