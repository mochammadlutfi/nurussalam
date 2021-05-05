<?php

namespace App\Http\Controllers\Umum;

use App\Models\GalleryPhoto;
use App\Models\GalleryAlbum;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;

class GaleriController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {

        $galeri = GalleryAlbum::latest()->orderby('created_at')->paginate(3);

        return view('umum.galeri.index', compact('galeri'));
    }

    public function video()
    {

        $video = Video::where('status', 1)->latest()->paginate(3);

        return view('umum.galeri.video', compact('video'));
    }

    public function detail($slug, Request $request)
    {
        $album = GalleryAlbum::where('slug', $slug)->first();

        $data = GalleryPhoto::where('album_id', $album->id)->latest()->paginate(10);
        if ($request->ajax()) {
            $data = Foto::where('album_id', $album->id)->latest()->paginate(4);
            return response()->json([
                'total' => $data->toArray()['total'],
                'html' => view('umum.galeri.data_foto', compact('data'))->render(),
            ]);
            // return response()->json($data);
        }
        $title = $album->nama;
        return view('umum.galeri.detail', compact('album', 'title', 'data'));
    }

    public function watch($slug)
    {
        $data = Video::where('slug', $slug)->first();
        
        return view('umum.galeri.watch', compact('data'));
    }


}
