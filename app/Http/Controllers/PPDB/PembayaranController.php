<?php

namespace App\Http\Controllers\PPDB;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;

use App\Models\PPDB;
use App\Models\PPDBRekening;
use App\Models\PPDBWali;
use App\Models\PPDBBayar;
use App\Models\PPDBBank;

use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // $cek = PPDBBayar::where('peserta_id')->
        // if()
        
        $bank = PPDBRekening::latest()->get();

        return view('ppdb.pembayaran.index', compact('bank'));
    }

    public function form(){
        
        $ppdb = PPDB::where('peserta_id', auth()->guard('web')->user()->id)->first();
        $data = PPDBBayar::where('ppdb_id', $ppdb->id)->first();
        if($data)
        {
            return $this->detail();
        }else{

            $bank = PPDBRekening::latest()->get();

            $ustadz = PPDBWali::where('is_active', 1)->orderBy('created_at', 'DESC')->get();

            return view('ppdb.pembayaran.form', compact('bank', 'ustadz'));
        }
    }

    public function save(Request $request)
    {
        $rules = [
            'bank' => 'required',
            'tgl_bayar' => 'required',
            'nominal' => 'required',
            'bukti' => 'required',
            'no_rek_pengirim' => 'required',
            'bank_pengirim' => 'required',
        ];

        $pesan = [
            'no_reg.exists' => 'No. Pendaftaran Tidak Terdaftar!',
            'bank.required' => 'Tujuan Pembayaran Wajib Diisi!',
            'nominal.required' => 'Nominal Pembayaran Wajib Diisi!',
            'tgl_bayar.required' => 'Tanggal Pembayaran Wajib Diisi!',
            'bukti.required' => 'Bukti Pembayaran Wajib Diisi!',
            'no_rek_pengirim.required' => 'No. Rekening Pengirim Wajib Diisi!',
            'bank_pengirim.required' => 'Bank Pengirim Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
            return back()->withErrors($validator->errors());
        }else{
            
            DB::beginTransaction();
            try{

                $bayar = new PPDBBayar();
                $bayar->ppdb_id = $ppdb_id;
                $bayar->rekening_id = $request->bank;
                $bayar->tgl_bayar = $request->tgl_bayar;
                $bayar->jumlah = $request->nominal;
                $bayar->pengirim_bank = $request->bank_pengirim;
                $bayar->pengirim_rek = $request->no_rek_pengirim;

                if($request->hasfile('bukti'))
                {
                    $bukti = $request->file('bukti');
                    $bukti_ext = $bukti->getClientOriginalExtension();
                    $buktiMove = $bukti->move(public_path().'/uploads/dokumen/'.$request->no_reg, 'bukti.'.$bukti_ext);
                    if($buktiMove)
                    {
                        $bayar->bukti = 'uploads/dokumen/'.$request->no_reg.'/bukti.'.$bukti_ext;
                    }
                }
                
                $bayar->save();
                $ppdb = PPDB::find($auth()->guard('web')->user()->ppdb->id);
                $ppdb->status = 1;

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

    public function detail()
    {
        $ppdb = PPDB::where('peserta_id', auth()->guard('web')->user()->id)->first();
        $data = PPDBBayar::where('ppdb_id', $ppdb->id)->first();
        if($data)
        {
            return view('ppdb.pembayaran.detail', compact('data'));
        }else{
            // return false
            return $this->form();
        }
    }
}
