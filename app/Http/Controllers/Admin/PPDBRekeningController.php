<?php

namespace App\Http\Controllers\Admin;

use App\Models\PPDBRekening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Storage;

class PPDBRekeningController extends Controller
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
            $data = PPDBRekening::orderBy('created_at', 'DESC')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('bank', function($row){
                return '<div class="media">
                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="'. $row->icon_url.'" style="width:45px"> </a>
                <div class="media-body ml-3">
                    <div class="font-size-h6 font-w700 mb-0">'.$row->bank.'</div>
                </div>
            </div>';
            })
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('rekening', function($row){

                return $row->no_rek;
            })
            ->addColumn('aksi', function($row){

                    $btn = '<button type="button" data-id="'.$row->id.'" class="btn btn-secondary btn-sm mr-1 btn-edit"><i class="si si-note mr-5"></i>Ubah</button>';
                    $btn .= '<button type="button" data-id="'.$row->id.'" class="btn btn-danger btn-sm btn-hapus"><i class="si si-trash mr-5"></i>Hapus</button>';
                    return $btn;
            })
            ->rawColumns(['nama', 'bank', 'aksi'])
            ->make(true);
        }
        return view('admin.ppdb.rekening');
    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama' => 'required|max:150',
            'rekening' => 'required|numeric|digits:13',
            'bank' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Atas Nama Rekening Wajib Diisi!',
            'rekening.required' => 'No Rekening Wajib Diisi!',
            'rekening.numeric' => 'No Rekening Harus Angka!',
            'rekening.digits' => 'No Rekening Harus 13 Angka!',
            'bank.required' => 'Bank Wajib Diisi!',
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
                $data = new PPDBRekening();
                $data->bank = $request->bank;
                $data->kode = $request->kode;
                $data->nama = $request->nama;
                $data->no_rek = $request->rekening;
                
                if(!empty($request->file('icon')))
                {
                    $cek = Storage::disk('umum')->exists($data->icon);
                    if($cek)
                    {
                        Storage::disk('umum')->delete($data->icon);
                    }
                    $p = Storage::disk('umum')->putFile(
                        'rekening',
                        $request->file('icon'),
                    );
                    $data->icon = $p;
                }
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
            'rekening' => 'required|numeric|digits:13',
            'bank' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Atas Nama Rekening Wajib Diisi!',
            'rekening.required' => 'No Rekening Wajib Diisi!',
            'rekening.numeric' => 'No Rekening Harus Angka!',
            'rekening.digits' => 'No Rekening Harus 13 Angka!',
            'bank.required' => 'Bank Wajib Diisi!',
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
                $data = PPDBRekening::find($request->id);
                $data->bank = $request->bank;
                $data->kode = $request->kode;
                $data->nama = $request->nama;
                $data->no_rek = $request->rekening;
                if(!empty($request->file('icon')))
                {
                    $p = Storage::disk('umum')->putFile(
                        'rekening',
                        $request->file('icon'),
                    );
                    $data->icon = $p;
                }
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
        $data = PPDBRekening::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = PPDBRekening::destroy($id);
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
