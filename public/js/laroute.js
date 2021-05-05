(function () {

    var laroute = (function () {

        var routes = {

            absolute: true,
            rootUrl: 'http://localhost/nurussalam',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/telescope\/{id}","name":"debugbar.telescope","action":"Barryvdh\Debugbar\Controllers\TelescopeController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["DELETE"],"uri":"_debugbar\/cache\/{key}\/{tags?}","name":"debugbar.cache.delete","action":"Barryvdh\Debugbar\Controllers\CacheController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"arrilot\/load-widget","name":null,"action":"Arrilot\Widgets\Controllers\WidgetController@showWidget"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Admin\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/beranda","name":"admin.beranda","action":"App\Http\Controllers\Admin\BerandaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/peserta","name":"admin.peserta","action":"App\Http\Controllers\Admin\PPDBController@index"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/simpan","name":"admin.ppdb.simpan","action":"App\Http\Controllers\Admin\PPDBController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/detail\/{id}","name":"admin.ppdb.detail","action":"App\Http\Controllers\Admin\PPDBController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/edit\/{id}","name":"admin.ppdb.edit","action":"App\Http\Controllers\Admin\PPDBController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/update","name":"admin.ppdb.update","action":"App\Http\Controllers\Admin\PPDBController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/hapus\/{id}","name":"admin.ppdb.hapus","action":"App\Http\Controllers\Admin\PPDBController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/pembayaran","name":"admin.ppdb.bayar","action":"App\Http\Controllers\Admin\PPDBBayarController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/pembayaran\/detail\/{id}","name":"admin.ppdb.bayar.detail","action":"App\Http\Controllers\Admin\PPDBBayarController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/pembayaran\/confirm\/{id}","name":"admin.ppdb.bayar.confirm","action":"App\Http\Controllers\Admin\PPDBBayarController@confirm"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/pembayaran\/simpan","name":"admin.ppdb.bayar.simpan","action":"App\Http\Controllers\Admin\PPDBBayarController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/pembayaran\/edit\/{id}","name":"admin.ppdb.bayar.edit","action":"App\Http\Controllers\Admin\PPDBBayarController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/pembayaran\/update","name":"admin.ppdb.bayar.update","action":"App\Http\Controllers\Admin\PPDBBayarController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/pembayaran\/hapus\/{id}","name":"admin.ppdb.bayar.hapus","action":"App\Http\Controllers\Admin\PPDBBayarController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/pembayaran\/json","name":"admin.ppdb.bayar.json","action":"App\Http\Controllers\Admin\PPDBBayarController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/rekening","name":"admin.ppdb.rekening","action":"App\Http\Controllers\Admin\PPDBRekeningController@index"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/rekening\/simpan","name":"admin.ppdb.rekening.simpan","action":"App\Http\Controllers\Admin\PPDBRekeningController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/rekening\/edit\/{id}","name":"admin.ppdb.rekening.edit","action":"App\Http\Controllers\Admin\PPDBRekeningController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/rekening\/update","name":"admin.ppdb.rekening.update","action":"App\Http\Controllers\Admin\PPDBRekeningController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/rekening\/hapus\/{id}","name":"admin.ppdb.rekening.hapus","action":"App\Http\Controllers\Admin\PPDBRekeningController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/rekening\/json","name":"admin.ppdb.rekening.json","action":"App\Http\Controllers\Admin\PPDBRekeningController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/wali","name":"admin.ppdb.wali","action":"App\Http\Controllers\Admin\PPDBWaliController@index"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/wali\/simpan","name":"admin.ppdb.wali.simpan","action":"App\Http\Controllers\Admin\PPDBWaliController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/wali\/edit\/{id}","name":"admin.ppdb.wali.edit","action":"App\Http\Controllers\Admin\PPDBWaliController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/wali\/update","name":"admin.ppdb.wali.update","action":"App\Http\Controllers\Admin\PPDBWaliController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/ppdb\/wali\/hapus\/{id}","name":"admin.ppdb.wali.hapus","action":"App\Http\Controllers\Admin\PPDBWaliController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/ppdb\/wali\/json","name":"admin.ppdb.wali.json","action":"App\Http\Controllers\Admin\PPDBWaliController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola","name":"admin.pengelola","action":"App\Http\Controllers\Admin\AdminController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/tambah","name":"admin.pengelola.tambah","action":"App\Http\Controllers\Admin\AdminController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/simpan","name":"admin.pengelola.simpan","action":"App\Http\Controllers\Admin\AdminController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/edit\/{id}","name":"admin.pengelola.edit","action":"App\Http\Controllers\Admin\AdminController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/update","name":"admin.pengelola.update","action":"App\Http\Controllers\Admin\AdminController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/hapus\/{id}","name":"admin.pengelola.hapus","action":"App\Http\Controllers\Admin\AdminController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/role","name":"admin.adminRole","action":"App\Http\Controllers\Admin\AdminRoleController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/role\/tambah","name":"admin.adminRole.tambah","action":"App\Http\Controllers\Admin\AdminRoleController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/role\/simpan","name":"admin.adminRole.simpan","action":"App\Http\Controllers\Admin\AdminRoleController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/role\/edit\/{id}","name":"admin.adminRole.edit","action":"App\Http\Controllers\Admin\AdminRoleController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/role\/update","name":"admin.adminRole.update","action":"App\Http\Controllers\Admin\AdminRoleController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/role\/hapus\/{id}","name":"admin.adminRole.hapus","action":"App\Http\Controllers\Admin\AdminRoleController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/role\/json","name":"admin.adminRole.json","action":"App\Http\Controllers\Admin\AdminRoleController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/galeri","name":"admin.galeri","action":"App\Http\Controllers\Admin\GaleriController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/galeri\/tambah","name":"admin.galeri.tambah","action":"App\Http\Controllers\Admin\GaleriController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/galeri\/simpan","name":"admin.galeri.simpan","action":"App\Http\Controllers\Admin\GaleriController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/galeri\/edit\/{id}","name":"admin.galeri.edit","action":"App\Http\Controllers\Admin\GaleriController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/galeri\/update","name":"admin.galeri.update","action":"App\Http\Controllers\Admin\GaleriController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/galeri\/hapus\/{id}","name":"admin.galeri.hapus","action":"App\Http\Controllers\Admin\GaleriController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/galeri\/foto\/{id}","name":"admin.galeri.foto","action":"App\Http\Controllers\Admin\GaleriFotoController@index"},{"host":null,"methods":["POST"],"uri":"admin\/galeri\/foto\/tambah","name":"admin.galeri.upload","action":"App\Http\Controllers\Admin\GaleriFotoController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/galeri\/foto\/hapus","name":"admin.galeri.foto_hapus","action":"App\Http\Controllers\Admin\GaleriFotoController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/video","name":"admin.video","action":"App\Http\Controllers\Admin\VideoController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/video\/tambah","name":"admin.video.tambah","action":"App\Http\Controllers\Admin\VideoController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/video\/simpan","name":"admin.video.simpan","action":"App\Http\Controllers\Admin\VideoController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/video\/edit\/{id}","name":"admin.video.edit","action":"App\Http\Controllers\Admin\VideoController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/video\/update","name":"admin.video.update","action":"App\Http\Controllers\Admin\VideoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/video\/hapus\/{id}","name":"admin.video.hapus","action":"App\Http\Controllers\Admin\VideoController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita","name":"admin.post","action":"App\Http\Controllers\Admin\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/cek_slug","name":"admin.post.cek_slug","action":"App\Http\Controllers\Admin\PostController@cek_slug"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/tambah","name":"admin.post.tambah","action":"App\Http\Controllers\Admin\PostController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/simpan","name":"admin.post.simpan","action":"App\Http\Controllers\Admin\PostController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/edit\/{id}","name":"admin.post.edit","action":"App\Http\Controllers\Admin\PostController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/update","name":"admin.post.update","action":"App\Http\Controllers\Admin\PostController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/hapus\/{id}","name":"admin.post.hapus","action":"App\Http\Controllers\Admin\PostController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/hapusFile","name":"admin.post.hapusFile","action":"App\Http\Controllers\Admin\PostController@hapusFile"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/kategori","name":"admin.postKategori","action":"App\Http\Controllers\Admin\PostKategoriController@index"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/kategori\/simpan","name":"admin.postKategori.simpan","action":"App\Http\Controllers\Admin\PostKategoriController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/kategori\/edit\/{id}","name":"admin.postKategori.edit","action":"App\Http\Controllers\Admin\PostKategoriController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/kategori\/update","name":"admin.postKategori.update","action":"App\Http\Controllers\Admin\PostKategoriController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/kategori\/hapus\/{id}","name":"admin.postKategori.hapus","action":"App\Http\Controllers\Admin\PostKategoriController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/kategori\/json","name":"admin.postKategori.json","action":"App\Http\Controllers\Admin\PostKategoriController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page","name":"admin.pages","action":"App\Http\Controllers\Admin\PageController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page\/tambah","name":"admin.page.tambah","action":"App\Http\Controllers\Admin\PageController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/page\/simpan","name":"admin.page.simpan","action":"App\Http\Controllers\Admin\PageController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page\/edit\/{id}","name":"admin.page.edit","action":"App\Http\Controllers\Admin\PageController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/page\/update","name":"admin.page.update","action":"App\Http\Controllers\Admin\PageController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page\/hapus\/{id}","name":"admin.page.hapus","action":"App\Http\Controllers\Admin\PageController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider","name":"admin.slider","action":"App\Http\Controllers\Admin\SliderController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/tambah","name":"admin.slider.tambah","action":"App\Http\Controllers\Admin\SliderController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/simpan","name":"admin.slider.simpan","action":"App\Http\Controllers\Admin\SliderController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/edit\/{id}","name":"admin.slider.edit","action":"App\Http\Controllers\Admin\SliderController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/update","name":"admin.slider.update","action":"App\Http\Controllers\Admin\SliderController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/hapus\/{id}","name":"admin.slider.hapus","action":"App\Http\Controllers\Admin\SliderController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/post_json","name":"admin.slider.post_json","action":"App\Http\Controllers\Admin\SliderController@post_json"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/pages_json","name":"admin.slider.pages_json","action":"App\Http\Controllers\Admin\SliderController@pages_json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengaturan","name":"admin.pengaturan","action":"App\Http\Controllers\Admin\PengaturanController@umum"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/umum","name":"admin.pengaturan.umum","action":"App\Http\Controllers\Admin\PengaturanController@umum"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/kontak","name":"admin.pengaturan.kontak","action":"App\Http\Controllers\Admin\PengaturanController@kontak"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/social-media","name":"admin.pengaturan.sosmed","action":"App\Http\Controllers\Admin\PengaturanController@sosmed"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/smtp","name":"admin.pengaturan.smtp","action":"App\Http\Controllers\Admin\PengaturanController@smtp"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"coba","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\Umum\HomeController@index"},{"host":null,"methods":["POST"],"uri":"daerahSelect","name":"daerahSelect","action":"App\Http\Controllers\Umum\GeneralController@daerahSelect"},{"host":null,"methods":["POST"],"uri":"opdSelect","name":"opdSelect","action":"App\Http\Controllers\Umum\GeneralController@opdSelect"},{"host":null,"methods":["POST"],"uri":"fraksiSelect","name":"fraksiSelect","action":"App\Http\Controllers\Umum\GeneralController@fraksiSelect"},{"host":null,"methods":["GET","HEAD"],"uri":"profile\/sejarah","name":"profile.sejarah","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"profile\/visi-dan-misi","name":"profile.visimisi","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"profile\/makna-logo","name":"profile.logo","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"profile\/kegiatan-santri","name":"profile.kegiatan","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"profile\/fasilitas-pondok","name":"profile.fasilitas","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"profile\/struktur-kepengurusan","name":"profile.kepengurusan","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"pendidikan\/smp-islam-nurussalam","name":"pendidikan.smp","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"pendidikan\/sma-islam-nurussalam","name":"pendidikan.sma","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"pendidikan\/kmi-kulliyatul-muallimin-al-islamiyyah","name":"pendidikan.kmi","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"berita","name":"posts","action":"App\Http\Controllers\Umum\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"berita\/{slug}","name":"post.detail","action":"App\Http\Controllers\Umum\PostController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"galeri\/foto","name":"galeri.foto","action":"App\Http\Controllers\Umum\GaleriController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"galeri\/foto\/{slug}","name":"galeri.detail","action":"App\Http\Controllers\Umum\GaleriController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"galeri\/video","name":"galeri.video","action":"App\Http\Controllers\Umum\GaleriController@video"},{"host":null,"methods":["GET","HEAD"],"uri":"galeri\/video\/{slug}","name":"galeri.watch","action":"App\Http\Controllers\Umum\GaleriController@watch"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb","name":"ppdb","action":"App\Http\Controllers\PPDB\CoreController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/daftar","name":"daftar","action":"App\Http\Controllers\PPDB\Auth\RegisterController@index"},{"host":null,"methods":["POST"],"uri":"ppdb\/registerPost","name":"registerPost","action":"App\Http\Controllers\PPDB\Auth\RegisterController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/login","name":"login","action":"App\Http\Controllers\PPDB\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"ppdb\/loginPost","name":"loginPost","action":"App\Http\Controllers\PPDB\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"ppdb\/logout","name":"logout","action":"App\Http\Controllers\PPDB\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/biaya","name":"ppdb.biaya","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/formulir","name":"form","action":"App\Http\Controllers\PPDB\PPDBController@index"},{"host":null,"methods":["POST"],"uri":"ppdb\/formulir\/save","name":"form.save","action":"App\Http\Controllers\PPDB\PPDBController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/formulir-saya","name":"form.detail","action":"App\Http\Controllers\PPDB\PPDBController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/pembayaran","name":"pembayaran","action":"App\Http\Controllers\PPDB\PembayaranController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/konfirmasi-pembayaran","name":"pembayaran.form","action":"App\Http\Controllers\PPDB\PembayaranController@form"},{"host":null,"methods":["POST"],"uri":"ppdb\/confirm","name":"pembayaran.confirm","action":"App\Http\Controllers\PPDB\PembayaranController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/u\/profile","name":"user.profil","action":"App\Http\Controllers\PPDB\UserController@index"},{"host":null,"methods":["POST"],"uri":"ppdb\/u\/update","name":"user.update","action":"App\Http\Controllers\PPDB\UserController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"ppdb\/u\/ubah-password","name":"user.changePassword","action":"App\Http\Controllers\PPDB\UserController@password"},{"host":null,"methods":["POST"],"uri":"ppdb\/u\/updatePW","name":"user.update_pw","action":"App\Http\Controllers\PPDB\UserController@updatePW"},{"host":null,"methods":["POST"],"uri":"ppdb\/bank","name":"ppdb.bank","action":"App\Http\Controllers\PPDB\CoreController@bank"},{"host":null,"methods":["POST"],"uri":"ppdb\/ustadz","name":"ppdb.ustadz","action":"App\Http\Controllers\PPDB\CoreController@ustadz"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

