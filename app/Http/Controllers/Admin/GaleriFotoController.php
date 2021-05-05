<?php

namespace App\Http\Controllers\Admin;


use App\Models\GalleryPhoto;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Image;
use Illuminate\Support\Facades\Storage;

class GaleriFotoController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($album_id, Request $request)
    {
        $album = GalleryAlbum::find($album_id);

        if ($request->ajax()) {
            $data = GalleryPhoto::where('album_id', $album_id)->latest()->paginate(10);

            return response()->json($data);
        }

        return view('admin.galeri.foto.form', compact('album'));
    }

    public function tambah(Request $request)
    {
        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $f)
            {
                $name= $f->getClientOriginalName();
                $path = Storage::disk('umum')->put('galeri/foto/'.$request->album_id, $f);
                $file = array(
                    'album_id' => $request->album_id,
                    'path' => 'uploads/'.$path,
                );
                GalleryPhoto::insert($file);
            }
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function hapus(Request $request)
    {
        $foto = GalleryPhoto::find($request->id);
        $cek = Storage::disk('public')->exists($foto->path);
        if($cek)
        {
            Storage::disk('public')->delete($foto->path);
        }
        $hapus_db = GalleryPhoto::destroy($foto->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
