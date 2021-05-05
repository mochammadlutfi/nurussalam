<?php

namespace App\Http\Controllers\Admin;

use App\Models\PPDB;
use App\Models\PPDBBayar;
use App\Models\PPDBRekening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Storage;

class PPDBBayarController extends Controller
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
            $data = PPDBBayar::with(array('ppdb.peserta', 'tujuan'))
            ->whereBetween('created_at', [$request->tgl_mulai. " 00:00:00", $request->tgl_akhir." 23:59:59"])
            ->where('rekening_id', 'like', '%' . $request->bank . '%')
            ->where('status', 'like', '%' . $request->status . '%')
            ->orderBy('created_at', 'DESC')->paginate(10);
            return response()->json($data);
        }
        $bank = PPDBRekening::latest()->get();
        return view('admin.ppdb.pembayaran.index', compact('bank'));
    }

    public function detail($id){
        $data = PPDBBayar::find($id);
        
        return view('admin.ppdb.pembayaran.detail', compact('data'));
    }

    public function confirm($id){
        // dd($request->all());
        DB::beginTransaction();
        try{
            $data = PPDBBayar::find($id);
            $data->status = 1;
            $data->save();

            $ppdb = PPDB::find($data->ppdb_id);
            $ppdb->status = 2;
            $ppdb->save();

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
                $data = new PPDBBayar();
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
                $data = PPDBBayar::find($request->id);
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
        $data = PPDBBayar::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = PPDBBayar::destroy($id);
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
