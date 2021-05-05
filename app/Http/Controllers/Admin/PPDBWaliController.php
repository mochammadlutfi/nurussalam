<?php

namespace App\Http\Controllers\Admin;

use App\Models\PPDBWali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Storage;

class PPDBWaliController extends Controller
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
            $data = PPDBWali::orderBy('created_at', 'DESC')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('status', function($row){

                if($row->is_active == 1){
                    return '<span class="badge badge-success">Aktif</span>';
                }else{
                    return' <span class="badge badge-danger">Tidak Aktif</span>';
                }
            })
            ->addColumn('aksi', function($row){

                    $btn = '<button type="button" data-id="'.$row->id.'" class="btn btn-secondary btn-sm mr-1 btn-edit"><i class="si si-note mr-5"></i>Ubah</button>';
                    $btn .= '<button type="button" data-id="'.$row->id.'" class="btn btn-danger btn-sm btn-hapus"><i class="si si-trash mr-5"></i>Hapus</button>';
                    return $btn;
            })
            ->rawColumns(['nama', 'status', 'aksi'])
            ->make(true);
        }
        return view('admin.ppdb.ustadz');
    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama' => 'required|max:150',
            'phone' => 'required|numeric',
            'status' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'phone.numeric' => 'No Handphone Harus Angka!',
            'phone.required' => 'No Handphone Wajib Diisi!',
            'status.required' => 'Status Wajib Diisi!',
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
                $data = new PPDBWali();
                $data->nama = $request->nama;
                $data->phone = $request->phone;
                $data->is_active = $request->status;
                $data->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => 'Error Menyimpan Data',
                    'log' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required|max:150',
            'phone' => 'required|numeric',
            'status' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'phone.numeric' => 'No Handphone Harus Angka!',
            'phone.required' => 'No Handphone Wajib Diisi!',
            'status.required' => 'Status Wajib Diisi!',
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
                $data = PPDBWali::find($request->id);
                $data->nama = $request->nama;
                $data->phone = $request->phone;
                $data->is_active = $request->status;
                $data->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => 'Error Menyimpan Data',
                    'log' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($id){
        $data = PPDBWali::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = PPDBWali::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = Fraksi::orderBy('created_at', 'DESC')->get();
        }else{
            $cari = $request->searchTerm;
            $fetchData = Fraksi::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
        }

        $data = array();
        foreach($fetchData as $row) {
            $data[] = array("id" => $row->id, "text"=> $row->nama);
        }

        return response()->json($data);
    }
}
