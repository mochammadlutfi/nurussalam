<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryPhoto;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
use Carbon\Carbon;
class GaleriController extends Controller
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
            $data = GalleryAlbum::withCount('photo')
            ->where('title', 'like', '%' . $request->keyword . '%')
            ->orderBy('created_at', 'DESC')->paginate(2);

            return response()->json($data);
        }

        return view('admin.galeri.foto.index');
    }


    public function simpan(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'featured_img' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Album Wajib Diisi!',
            'featured_img.required' => 'Thumbnail Album Wajib Diisi!',
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

                $data = new GalleryAlbum();
                $data->title = $request->nama;
                $data->description = $request->deskripsi;
                $data->status = $request->status;

                if(!empty($request->featured_img))
                {
                    $folderPath = 'galeri/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->thumbnail = 'uploads/'.$imageName;
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
                'id' => $data->id,
            ]);
        }
    }

    public function edit($id){
        $album = GalleryAlbum::find($id);
        return response()->json($album);
    }

    public function update(Request $request)
    {

        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Album Wajib Diisi!',
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
                $data = GalleryAlbum::find($request->id);

                if(!empty($request->featured_img))
                {
                    $cek = Storage::disk('public')->exists($data->foto);
                    if($cek)
                    {
                        Storage::disk('public')->delete($data->foto);
                    }

                    $folderPath = 'galeri/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->thumbnail = 'uploads/'.$imageName;
                }

                $data->title = $request->nama;
                $data->description = $request->deskripsi;
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
            ]);
        }
    }


    public function hapus($id)
    {
        DB::beginTransaction();
        try{
            $album = GalleryAlbum::find($id);
            $foto = GalleryPhoto::where('album_id', $album->id)->get();
            foreach($foto as $f)
            {
                Storage::disk('public')->delete($f->thumbnail);
            }
            $del_album_img = Storage::disk('public')->delete($album->thumbnail);
            GalleryAlbum::destroy($album->id);
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
