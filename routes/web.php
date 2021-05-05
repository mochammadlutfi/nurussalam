<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

Route::get('/coba', function () {
    
});

Route::namespace('Umum')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/daerahSelect', 'GeneralController@daerahSelect')->name('daerahSelect');
    Route::post('/opdSelect','GeneralController@opdSelect')->name('opdSelect');
    Route::post('/fraksiSelect','GeneralController@fraksiSelect')->name('fraksiSelect');

    
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/sejarah', ['as' => 'profile.sejarah', function () { 
                return view("umum.profile.sejarah"); 
            }
        ]);

        Route::get('/visi-dan-misi', ['as' => 'profile.visimisi', function () { 
                return view("umum.profile.visimisi"); 
            }
        ]);

        Route::get('/makna-logo', ['as' => 'profile.logo', function () { 
                return view("umum.profile.logo"); 
            }
        ]);

        Route::get('/kegiatan-santri', ['as' => 'profile.kegiatan', function () { 
                return view("umum.profile.kegiatan"); 
            }
        ]);

        Route::get('/fasilitas-pondok', ['as' => 'profile.fasilitas', function () { 
                return view("umum.profile.fasilitas"); 
            }
        ]);
        
        Route::get('/fasilitas-pondok', ['as' => 'profile.fasilitas', function () { 
                return view("umum.profile.fasilitas"); 
            }
        ]);

        Route::get('/struktur-kepengurusan', ['as' => 'profile.kepengurusan', function () { 
                return view("umum.profile.kepengurusan"); 
            }
        ]);
    });

    Route::group(['prefix' => 'pendidikan'], function(){
        Route::get('/smp-islam-nurussalam', ['as' => 'pendidikan.smp', function () { 
                return view("umum.pendidikan.smp"); 
            }
        ]);
        
        Route::get('/sma-islam-nurussalam', ['as' => 'pendidikan.sma', function () { 
                return view("umum.pendidikan.sma"); 
            }
        ]);

        Route::get('/kmi-kulliyatul-muallimin-al-islamiyyah', ['as' => 'pendidikan.kmi', function () { 
                return view("umum.pendidikan.kmi"); 
            }
        ]);
    });

    Route::group(['prefix' => 'berita'], function(){
        Route::get('/', 'PostController@index')->name('posts');
        Route::get('/{slug}', 'PostController@detail')->name('post.detail');
    });

    Route::group(['prefix' => 'galeri'], function(){
        Route::get('foto/', 'GaleriController@index')->name('galeri.foto');
        Route::get('foto/{slug}', 'GaleriController@detail')->name('galeri.detail');
        Route::get('/video', 'GaleriController@video')->name('galeri.video');
        Route::get('/video/{slug}', 'GaleriController@watch')->name('galeri.watch');
    });
});

Route::prefix('/ppdb')->namespace('PPDB')->group(function(){
    Route::get('/', 'CoreController@index')->name('ppdb');

    Route::group(['namespace' => 'Auth'], function(){
        
        Route::get('/daftar','RegisterController@index')->name('daftar');
        Route::post('/registerPost','RegisterController@simpan')->name('registerPost');
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/loginPost','LoginController@login')->name('loginPost');
        Route::post('/logout','LoginController@logout')->name('logout');

        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');
    });
    

    Route::get('/biaya', ['as' => 'ppdb.biaya', function () { 
        return view("ppdb.biaya"); 
    }]);
    

    Route::group(['prefix' => 'formulir'], function(){
        Route::get('/', 'PPDBController@index')->name('form');
        Route::post('/save','PPDBController@save')->name('form.save');
    });

    Route::get('/formulir-saya','PPDBController@detail')->name('form.detail');
    
    
    Route::get('/pembayaran', 'PembayaranController@index')->name('pembayaran');
    Route::get('/konfirmasi-pembayaran', 'PembayaranController@form')->name('pembayaran.form');
    Route::post('/confirm', 'PembayaranController@save')->name('pembayaran.confirm');
    

    Route::group(['prefix' => 'u'], function(){
        Route::get('/profile','UserController@index')->name('user.profil');
        Route::post('/update','UserController@update')->name('user.update');
        Route::get('/ubah-password','UserController@password')->name('user.changePassword');
        Route::post('/updatePW','UserController@updatePW')->name('user.update_pw');
    });

    Route::post('/bank', 'CoreController@bank')->name('ppdb.bank');
    Route::post('/ustadz', 'CoreController@ustadz')->name('ppdb.ustadz');
});
