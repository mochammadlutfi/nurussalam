<?php

namespace App\Http\Controllers\Admin;


use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use Carbon\Carbon;
use DB;
use Image;
use File;

class VideoController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Video::
            where('judul', 'like', '%' . $request->keyword . '%')
            ->orderBy('created_at', 'DESC')->paginate(1);
            return response()->json($data);
        }
        return view('admin.galeri.video.index');
    }

    public function tambah(){
        return view('admin.galeri.video.form');
    }

    public function simpan(Request $request)
    {
        // dd(public_path());
        // dd($request->all());
        $rules = [
            'judul' => 'required',
            'url' => 'required',
            'status' => 'required'
        ];

        $pesan = [
            'judul.required' => 'Judul Video Wajib Diisi!',
            'url.required' => 'URL Video Wajib Diisi!',
            'status.required' => 'Status Video Wajib Diisi!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                $data = new Video();
                if(!empty($request->cover_url))
                {
                    $infoPath = pathinfo($request->cover_url);
                    $ext = $infoPath['extension'];
                    $contents = file_get_contents($request->cover_url);
                    $foto_path = 'uploads/galeri/video/'.md5($request->judul).'.'.$ext;
                    $foto = Image::make($request->cover_url)->save(public_path($foto_path));
                    $data->thumbnail = $foto_path;
                }else if(!empty($request->featured_img))
                {
                    $folderPath = 'galeri/video/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->featured_img = 'uploads/'.$imageName;
                }

                if(!empty($request->deskripsi))
                {
                    libxml_use_internal_errors(true);
                    $dom = new \domdocument();
                    $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $data->deskripsi = $dom->savehtml();
                }
                $data->judul = $request->judul;
                $data->url = $request->url;
                $data->status = $request->status;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
                'slug' => $data->url,
            ]);
        }
    }

    public function edit($id){
        $data = Video::find($id);
        return view('admin.galeri.video.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'url' => 'required',
            'judul' => 'required',
        ];

        $pesan = [
            'url.required' => 'URL Video Wajib Diisi!',
            'judul.required' => 'Nama Video Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();

            try{
                $data = Video::find($request->id);
                $data->judul = $request->judul;
                $data->status = $request->status;
                if(!empty($request->cover_url))
                {
                    $cek = Storage::disk('umum')->exists($data->thumbnail);
                    if($cek)
                    {
                        Storage::disk('umum')->delete($data->thumbnail);
                    }
                    $infoPath = pathinfo($request->cover_url);
                    $ext = $infoPath['extension'];
                    $contents = file_get_contents($request->cover_url);
                    $foto_path = 'uploads/galeri/video/'.md5($request->judul).'.'.$ext;
                    $foto = Image::make($request->cover_url)->save(public_path($foto_path));
                    $data->thumbnail = 'uploads/'.$foto_path;
                }else if(!empty($request->featured_img))
                {
                    $folderPath = 'galeri/video/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->thumbnail = 'uploads/'.$imageName;
                }

                if(!empty($request->deskripsi))
                {
                    libxml_use_internal_errors(true);
                    $dom = new \domdocument();
                    $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $data->deskripsi = $dom->savehtml();
                }
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function hapus($id)
    {
        $video = Video::find($id);
        $cek = Storage::disk('public')->exists($video->thumbnail);
        if($cek)
        {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $hapus_db = Video::destroy($video->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }

    }

}
