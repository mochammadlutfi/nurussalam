<?php

/* ----------------------- Admin Routes START -------------------------------- */

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/','LoginController@showLoginForm');
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        // //Forgot Password Routes
        // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        // //Reset Password Routes
        // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // // Email Verification Route(s)
        // Route::get('email/verify','VerificationController@show')->name('verification.notice');
        // Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        // Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });

    Route::get('/beranda','BerandaController@index')->name('beranda');


    Route::prefix('ppdb')->group(function(){

        Route::get('/peserta','PPDBController@index')->name('peserta');
        Route::post('/simpan','PPDBController@simpan')->name('ppdb.simpan');
        Route::get('/detail/{id}','PPDBController@detail')->name('ppdb.detail');
        Route::get('/edit/{id}','PPDBController@edit')->name('ppdb.edit');
        Route::post('/update','PPDBController@update')->name('ppdb.update');
        Route::get('/hapus/{id}','PPDBController@hapus')->name('ppdb.hapus');

        Route::prefix('pembayaran')->group(function(){
            Route::get('/','PPDBBayarController@index')->name('ppdb.bayar');
            Route::get('/detail/{id}','PPDBBayarController@detail')->name('ppdb.bayar.detail');
            Route::get('/confirm/{id}','PPDBBayarController@confirm')->name('ppdb.bayar.confirm');
            Route::post('/simpan','PPDBBayarController@simpan')->name('ppdb.bayar.simpan');
            Route::get('/edit/{id}','PPDBBayarController@edit')->name('ppdb.bayar.edit');
            Route::post('/update','PPDBBayarController@update')->name('ppdb.bayar.update');
            Route::get('/hapus/{id}','PPDBBayarController@hapus')->name('ppdb.bayar.hapus');
            Route::post('/json','PPDBBayarController@json')->name('ppdb.bayar.json');
        });

        Route::prefix('rekening')->group(function(){
            //Login Routes
            Route::get('/','PPDBRekeningController@index')->name('ppdb.rekening');
            Route::post('/simpan','PPDBRekeningController@simpan')->name('ppdb.rekening.simpan');
            Route::get('/edit/{id}','PPDBRekeningController@edit')->name('ppdb.rekening.edit');
            Route::post('/update','PPDBRekeningController@update')->name('ppdb.rekening.update');
            Route::get('/hapus/{id}','PPDBRekeningController@hapus')->name('ppdb.rekening.hapus');
            Route::post('/json','PPDBRekeningController@json')->name('ppdb.rekening.json');
        });

        Route::prefix('wali')->group(function(){
            //Login Routes
            Route::get('/','PPDBWaliController@index')->name('ppdb.wali');
            Route::post('/simpan','PPDBWaliController@simpan')->name('ppdb.wali.simpan');
            Route::get('/edit/{id}','PPDBWaliController@edit')->name('ppdb.wali.edit');
            Route::post('/update','PPDBWaliController@update')->name('ppdb.wali.update');
            Route::get('/hapus/{id}','PPDBWaliController@hapus')->name('ppdb.wali.hapus');
            Route::post('/json','PPDBWaliController@json')->name('ppdb.wali.json');
        });
    });

    Route::group(['prefix' => 'pengelola'], function () {
        Route::get('/','AdminController@index')->name('pengelola');
        Route::get('/tambah','AdminController@tambah')->name('pengelola.tambah');
        Route::post('/simpan','AdminController@simpan')->name('pengelola.simpan');
        Route::get('/edit/{id}','AdminController@edit')->name('pengelola.edit');
        Route::post('/update','AdminController@update')->name('pengelola.update');
        Route::get('/hapus/{id}','AdminController@hapus')->name('pengelola.hapus');


        Route::group(['prefix' => 'role'], function(){
            Route::get('/', 'AdminRoleController@index')->name('adminRole');
            Route::get('/tambah', 'AdminRoleController@tambah')->name('adminRole.tambah');
            Route::post('/simpan','AdminRoleController@simpan')->name('adminRole.simpan');
            Route::get('/edit/{id}','AdminRoleController@edit')->name('adminRole.edit');
            Route::post('/update','AdminRoleController@update')->name('adminRole.update');
            Route::get('/hapus/{id}','AdminRoleController@hapus')->name('adminRole.hapus');
            Route::post('/json','AdminRoleController@json')->name('adminRole.json');
        });

    });

    Route::group(['prefix' => 'galeri'], function(){
        Route::get('/', 'GaleriController@index')->name('galeri');
        Route::get('/tambah', 'GaleriController@tambah')->name('galeri.tambah');
        Route::post('/simpan','GaleriController@simpan')->name('galeri.simpan');
        Route::get('/edit/{id}','GaleriController@edit')->name('galeri.edit');
        Route::post('/update','GaleriController@update')->name('galeri.update');
        Route::get('/hapus/{id}','GaleriController@hapus')->name('galeri.hapus');

        Route::group(['prefix' => 'foto'], function(){
            Route::get('/{id}', 'GaleriFotoController@index')->name('galeri.foto');
            Route::post('/tambah','GaleriFotoController@tambah')->name('galeri.upload');
            Route::post('/hapus','GaleriFotoController@hapus')->name('galeri.foto_hapus');
        });
    });

    Route::group(['prefix' => 'video'], function(){
        Route::get('/', 'VideoController@index')->name('video');
        Route::get('/tambah', 'VideoController@tambah')->name('video.tambah');
        Route::post('/simpan','VideoController@simpan')->name('video.simpan');
        Route::get('/edit/{id}','VideoController@edit')->name('video.edit');
        Route::post('/update','VideoController@update')->name('video.update');
        Route::get('/hapus/{id}','VideoController@hapus')->name('video.hapus');
    });

    Route::group(['prefix' => 'berita'], function(){
        Route::get('/', 'PostController@index')->name('post');
        Route::get('/cek_slug', 'PostController@cek_slug')->name('post.cek_slug');
        Route::get('/tambah', 'PostController@tambah')->name('post.tambah');
        Route::post('/simpan','PostController@simpan')->name('post.simpan');
        Route::get('/edit/{id}','PostController@edit')->name('post.edit');
        Route::post('/update','PostController@update')->name('post.update');
        Route::get('/hapus/{id}','PostController@hapus')->name('post.hapus');
        Route::post('/hapusFile','PostController@hapusFile')->name('post.hapusFile');

        Route::group(['prefix' => 'kategori'], function(){
            Route::get('/', 'PostKategoriController@index')->name('postKategori');
            Route::post('/simpan','PostKategoriController@simpan')->name('postKategori.simpan');
            Route::get('/edit/{id}','PostKategoriController@edit')->name('postKategori.edit');
            Route::post('/update','PostKategoriController@update')->name('postKategori.update');
            Route::get('/hapus/{id}','PostKategoriController@hapus')->name('postKategori.hapus');
            Route::post('/json','PostKategoriController@json')->name('postKategori.json');
        });

    });

    Route::group(['prefix' => 'page'], function(){
        Route::get('/', 'PageController@index')->name('pages');
        Route::get('/tambah', 'PageController@tambah')->name('page.tambah');
        Route::post('/simpan','PageController@simpan')->name('page.simpan');
        Route::get('/edit/{id}','PageController@edit')->name('page.edit');
        Route::post('/update','PageController@update')->name('page.update');
        Route::get('/hapus/{id}','PageController@hapus')->name('page.hapus');
    });

    Route::group(['prefix' => 'slider'], function(){
        Route::get('/', 'SliderController@index')->name('slider');
        Route::get('/tambah', 'SliderController@tambah')->name('slider.tambah');
        Route::post('/simpan','SliderController@simpan')->name('slider.simpan');
        Route::get('/edit/{id}','SliderController@edit')->name('slider.edit');
        Route::post('/update','SliderController@update')->name('slider.update');
        Route::get('/hapus/{id}','SliderController@hapus')->name('slider.hapus');

        
        Route::post('/post_json','SliderController@post_json')->name('slider.post_json');
        Route::post('/pages_json','SliderController@pages_json')->name('slider.pages_json');
    });

    Route::group(['prefix' => 'pengaturan'], function () {
        Route::get('/','PengaturanController@umum')->name('pengaturan');
        Route::match(['get', 'post'], '/umum', 'PengaturanController@umum')->name('pengaturan.umum');
        Route::match(['get', 'post'], '/kontak', 'PengaturanController@kontak')->name('pengaturan.kontak');
        Route::match(['get', 'post'], '/social-media', 'PengaturanController@sosmed')->name('pengaturan.sosmed');
        Route::match(['get', 'post'], '/smtp', 'PengaturanController@smtp')->name('pengaturan.smtp');
    });

});

/* ----------------------- Admin Routes END -------------------------------- */
