<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use App\Helpers\GeneralHelp;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PageController extends Controller
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
            $data = Page::orderBy('created_at', 'DESC')->paginate(10);

            if($data->toArray()['next_page_url'] == null)
            {
                $next = false;
            }else{
                $next = true;
            }

            if($data->toArray()['prev_page_url'] == null)
            {
                $prev = false;
            }else{
                $prev = true;
            }

            if($data->toArray()['from'] == null)
            {
                $nav = 'Menampilkan Berita 0 - 0 Dari 0';
            }else{
                $nav = 'Menampilkan Berita '. $data->toArray()['from'] .' - '.$data->toArray()['to'] .' Dari '.$data->toArray()['total'];
            }

            return response()->json([
                'current_page' => $data->toArray()['current_page'],
                'next_page' => $next,
                'prev_page' => $prev,
                'navigasi' => $nav,
                'html' => view('admin.page.data', compact('data'))->render(),
            ]);
        }
        return view('admin.page.index');

    }

    public function tambah()
    {
        return view('admin.page.form');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'judul' => 'required',
        ];

        $pesan = [
            'judul.required' => 'Judul Halaman Wajib Diisi!',
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

                $data = new Page();

                libxml_use_internal_errors(true);
                $dom = new \domdocument();
                $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $deskripsi = $dom->savehtml();

                if(!empty($request->featured_img))
                {
                    $folderPath = 'pages/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->featured_img = 'uploads/'.$imageName;
                }
                $data->judul = $request->judul;
                $data->deskripsi = $deskripsi;
                $data->seo_keyword = $request->seo_keyword;
                $data->seo_description = $request->seo_description;
                $data->seo_tags = $request->seo_tags;
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
                'pesan' => 'Halaman Baru Berhasil Disimpan!',
            ]);
        }
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $rules = [
            'judul' => 'required',
        ];

        $pesan = [
            'judul.required' => 'Judul Berita Wajib Diisi!',
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
                $data = Page::find($request->page_id);

                if(!empty($request->featured_img))
                {
                    $cek = Storage::disk('public')->exists($data->featured_img);
                    if($cek)
                    {
                        Storage::disk('public')->delete($data->featured_img);
                    }
                    $folderPath = 'post/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->featured_img = 'uploads/'.$imageName;
                }

                libxml_use_internal_errors(true);
                $dom = new \domdocument();
                $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $count => $image) {
                    $src = $image->getAttribute('src');
                    if (preg_match('/data:image/', $src)) {
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimeType = $groups['mime'];
                        $path = '/uploads/post/images/' . uniqid('', true) . '.' . $mimeType;
                        Storage::disk('umum')->put($path, file_get_contents($src));
                        $image->removeAttribute('src');
                        $image->setAttribute('src', Storage::disk('umum')->url($path));
                    }
                }
                $deskripsi = $dom->savehtml();

                $data->judul = $request->judul;
                $data->deskripsi = $deskripsi;
                $data->seo_keyword = $request->seo_keyword;
                $data->seo_description = $request->seo_description;
                $data->seo_tags = $request->seo_tags;
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
                'pesan' => 'Halaman Berhasil Diperbaharui!',
            ]);
        }
    }

    public function hapus($id)
    {
        $post = Page::find($id);
        $cek = Storage::disk('umum')->exists($post->featured_img);
        if($cek)
        {
            Storage::disk('umum')->delete($post->featured_img);
        }
        $hapus_db = Page::destroy($post->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }

    }

    public function hapusFile(Request $request)
    {
        $file_name = str_replace(url('/').'/', '', $request->src);
        $cek = Storage::disk('umum')->exists($file_name);
        if($cek)
        {
            $hapus = Storage::disk('umum')->delete($file_name);
        }
        $post = Page::find($request->post_id);

        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/uploads/post/images/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('umum')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $image->setAttribute('src', Storage::disk('umum')->url($path));
            }
        }
        $post->deskripsi = $dom->savehtml();
        $post->save();

        return response()->json([
            'fail' => false,
        ]);
    }
}
