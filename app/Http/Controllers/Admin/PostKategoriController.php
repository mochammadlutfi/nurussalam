<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostKategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PostKategoriController extends Controller
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
     * Menampilkan Index Kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PostKategori::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('jumlah', function($row){
                        return  $row->post()->count().' Berita';
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="javascript:void(0)" onClick="edit('. $row->kategori_id .')">
                                    <i class="si si-note mr-5"></i>Ubah
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('. $row->kategori_id .')">
                                    <i class="si si-trash mr-5"></i>Hapus
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'status', 'jumlah'])
                ->make(true);
        }
        return view('admin.post.kategori');

    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
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
                $data = new PostKategori();
                $data->nama = $request->nama;
                $data->deskripsi = $request->deskripsi;
                $data->seo_keyword = $request->seo_keyword;
                $data->seo_description = $request->seo_description;
                $data->seo_tags = $request->seo_tags;
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
                'pesan' => 'Kategori Baru Berhasil Ditambahkan!'
            ]);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
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
                $data = PostKategori::find($request->id);
                $data->nama = $request->nama;
                $data->deskripsi = $request->deskripsi;
                $data->seo_keyword = $request->seo_keyword;
                $data->seo_description = $request->seo_description;
                $data->seo_tags = $request->seo_tags;
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
                'pesan' => 'Kategori Berhasil Diperbaharui!'
            ]);
        }
    }

    public function edit($id){
        return response()->json(PostKategori::find($id));
    }

    public function hapus($id)
    {
        $data = PostKategori::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = PostKategori::orderBy('created_at', 'DESC')->get();
        }else{
            $cari = $request->searchTerm;
            $fetchData = PostKategori::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
        }

        $data = array();
        foreach($fetchData as $row) {
            $data[] = array("id" =>$row->kategori_id, "text"=>$row->nama);
        }

        return response()->json($data);
    }
}
