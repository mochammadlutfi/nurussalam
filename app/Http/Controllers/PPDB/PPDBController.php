<?php

namespace App\Http\Controllers\PPDB;

use App\Models\PPDB;
use App\Models\PPDBRekening;
use App\Models\PPDBWali;
use App\Models\PPDBBayar;
use App\Models\PPDBBank;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class PPDBController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        $bank = PPDBRekening::latest()->get();
        $ustadz = PPDBWali::where('is_active', 1)->orderBy('created_at', 'DESC')->get();

       return view('ppdb.pendaftaran', compact('bank', 'ustadz'));
    }

    public function save(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'program' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'asal_sekolah' => 'required',
            'nik' => 'required',
            'wali_nama' => 'required',
            'wali_phone' => 'required',
            'ijazah' => 'required',
            'akta' => 'required',
            'wali_ktp' => 'required',
            'skkb' => 'required',
            'swab' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'program.required' => 'Program Studi Wajib Diisi!',
            'gender.required' => 'Jenis Kelamin Wajib Diisi!',
            'alamat.required' => 'Alamat Lengkap Wajib Diisi!',
            'tmp_lahir.required' => 'Tempat Lahir Wajib Diisi!',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi!',
            'asal_sekolah.required' => 'Asal Sekolah / Madrasah Wajib Diisi!',
            'nik.required' => 'NIK Wajib Diisi!',
            'wali_nama.required' => 'Nama Orang Tua / Wali Wajib Diisi!',
            'wali_phone.required' => 'No. HP Orang Tua / Wali Wajib Diisi!',
            'ijazah.required' => 'File Ijazah Wajib Diisi!',
            'akta.required' => 'Akta Kelahiran Wajib Diisi!',
            'wali_ktp.required' => 'KTP Orang Tua / Wali Wajib Diisi!',
            'skkb.required' => 'Surat Keterangan Kelakuan Baik Wajib Diisi!',
            'swab.required' => 'Surat Hasil Swab / Rapid Test Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            
            $kd_register = get_kd_register();
            DB::beginTransaction();
            try{
                // dd($request->all());
                $ppdb = new PPDB();
                $ppdb->kd_registrasi = $kd_register;
                $ppdb->peserta_id = auth()->guard('web')->user()->id;
                $ppdb->gender = $request->gender;
                $ppdb->alamat = $request->alamat;
                $ppdb->tmp_lahir = $request->tmp_lahir;
                $ppdb->tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
                $ppdb->asal_sekolah = $request->asal_sekolah;
                $ppdb->NIK = $request->nik;
                $ppdb->wali_nama = $request->wali_nama;
                $ppdb->wali_phone = $request->wali_phone;
                
                $ppdb->wali_id = $request->ustadz;

                if($request->hasfile('ijazah'))
                {
                    $ijazah = $request->file('ijazah');
                    $ijazah_ext = $ijazah->getClientOriginalExtension();
                    $ijazahMove = $ijazah->move(public_path().'/uploads/dokumen/'.$kd_register, '1-Ijazah.'.$ijazah_ext);
                    if($ijazahMove)
                    {
                        $ppdb->ijazah = 'uploads/dokumen/'.$kd_register.'/ijazah.'.$ijazah_ext;
                    }
                }

                if($request->hasfile('akta'))
                {
                    $akta = $request->file('akta');
                    $akta_ext = $akta->getClientOriginalExtension();
                    $aktaMove = $akta->move(public_path().'/uploads/dokumen/'.$kd_register, '2-Akta_Kelahiran.'.$akta_ext);
                    if($aktaMove)
                    {
                        $ppdb->akta_kelahiran = 'uploads/dokumen/'.$kd_register.'/2-Akta_Kelahiran.'.$akta_ext;
                    }
                }

                if($request->hasfile('wali_ktp'))
                {
                    $wali_ktp = $request->file('wali_ktp');
                    $wali_ktp_ext = $wali_ktp->getClientOriginalExtension();
                    $wali_ktpMove = $wali_ktp->move(public_path().'/uploads/dokumen/'.$kd_register, '3-KTP_Wali.'.$wali_ktp_ext);
                    if($wali_ktpMove)
                    {
                        $ppdb->wali_ktp = 'uploads/dokumen/'.$kd_register.'/3-KTP_Wali.'.$wali_ktp_ext;
                    }
                }

                if($request->hasfile('skkb'))
                {
                    $skkb = $request->file('skkb');
                    $skkb_ext = $skkb->getClientOriginalExtension();
                    $skkbMove = $skkb->move(public_path().'/uploads/dokumen/'.$kd_register, '4-Surat_Keterangan_kelakukan_Baik.'.$skkb_ext);
                    if($skkbMove)
                    {
                        $ppdb->skkb = 'uploads/dokumen/'.$kd_register.'/4-Surat_Keterangan_kelakukan_Baik.'.$skkb_ext;
                    }
                }

                if($request->hasfile('swab'))
                {
                    $swab = $request->file('swab');
                    $swab_ext = $swab->getClientOriginalExtension();
                    $swabMove = $swab->move(public_path().'/uploads/dokumen/'.$kd_register, '5-Hasil_Swab_Rapid_Test.'.$swab_ext);
                    if($swabMove)
                    {
                        $ppdb->swab = 'uploads/dokumen/'.$kd_register.'/5-Hasil_Swab_Rapid_Test.'.$ijazah_ext;
                    }
                }

                $ppdb->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'log' => $e,
                    'noreg' => $ppdb->kd_register,
                ]);
            }

            DB::commit();
            return response()->json([
                'fail' => false,
                'noreg' => $kd_register,
            ]);
        }
    }

    
    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(){

        $id = auth()->guard('web')->user()->id;
        
        $data = PPDB::where('peserta_id', $id)->first();

        return view('ppdb.detail', compact('data'));
    }

}
