<?php

namespace App\Http\Controllers\Umum;

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
    }

    public function index(Request $request)
    {
        return view('umum.ppdb.index');
    }

    public function daftar()
    {
        $bank = PPDBRekening::latest()->get();

        $ustadz = PPDBWali::where('is_active', 1)->orderBy('created_at', 'DESC')->get();

       return view('umum.ppdb.daftar', compact('bank', 'ustadz'));
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'program' => 'required',
            'gender' => 'required',
            'email' => 'required',
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
            'email.required' => 'Alamat Email Wajib Diisi!',
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
            // return response()->json([
            //     'fail' => true,
            //     'errors' => $validator->errors()
            // ]);
            return back()->withErrors($validator->errors());
        }else{
            
            DB::beginTransaction();
            try{
                // dd($request->all());
                $kd_register = get_kd_register();
                $ppdb = new PPDB();
                $ppdb->kd_registrasi = $kd_register;
                $ppdb->nama = $request->nama;
                $ppdb->gender = $request->gender;
                $ppdb->email = $request->email;
                $ppdb->alamat = $request->alamat;
                $ppdb->tmp_lahir = $request->tmp_lahir;
                // $ppdb->tgl_lahir = $request->tgl_lahir;
                $ppdb->asal_sekolah = $request->asal_sekolah;
                $ppdb->NIK = $request->nik;
                $ppdb->wali_nama = $request->wali_nama;
                $ppdb->wali_phone = $request->wali_phone;
                
                $ppdb->wali_id = $request->ustadz;
                $ppdb->rek_id = $request->pembayaran;

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
                    'pesan' => 'Error Menyimpan Data',
                    'log' => $e,
                ]);
            }

            DB::commit();
            $request->session()->put('ppdb', $kd_register);
            return response()->json([
                'fail' => false,
            ]);
    
            // return view('umum.ppdb.pembayaran', compact('ppdb'));
        }
    }

    public function pembayaran(Request $request){
        if ($request->session()->has('ppdb')) {

            $ppdb = PPDB::where('kd_registrasi', $request->session()->get('ppdb'))->first();
            $rekening = PPDBRekening::latest()->get();
            return view('umum.ppdb.pembayaran', compact('ppdb', 'rekening'));
        }
        
        return redirect()->route('ppdb.daftar');
    }

    public function konfirmasi(){
        // if ($request->session()->has('ppdb')) {

        //     $ppdb = PPDB::where('kd_registrasi', $request->session()->get('ppdb'))->first();
            $bank = PPDBRekening::latest()->get();
        // }
        
        // return redirect()->route('ppdb.daftar');
        
        return view('umum.ppdb.konfirmasi', compact('bank'));
    }

    public function confirm(Request $request)
    {
        $rules = [
            'no_reg' => 'required|exists:ppdb,kd_registrasi',
            'bank' => 'required',
            'tgl_bayar' => 'required',
            'nominal' => 'required',
            'bukti' => 'required',
        ];

        $pesan = [
            'no_reg.required' => 'No. Pendaftaran Wajib Diisi!',
            'no_reg.exists' => 'No. Pendaftaran Tidak Terdaftar!',
            'bank.required' => 'Tujuan Pembayaran Wajib Diisi!',
            'nominal.required' => 'Nominal Pembayaran Wajib Diisi!',
            'tgl_bayar.required' => 'Tanggal Pembayaran Wajib Diisi!',
            'bukti.required' => 'Bukti Pembayaran Wajib Diisi!',
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
                $ppdb = PPDB::where('kd_registrasi', $request->no_reg)->first();
                $cekBayar = PPDBBayar::where('ppdb_id', $ppdb->id)->first();
                if($cekBayar){
                    return response()->json([
                        'fail' => true,
                        'pesan' => 'Konfirmasi Pembayaran Pendaftaran Kamu Sedang Di Proses!',
                    ]);
                }else{
                    $bayar = new PPDBBayar();
                    $bayar->ppdb_id = $ppdb->id;
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
                }

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

    public function riwayat(Request $request)
    {

        if($request->ajax())
        {
            $start = Carbon::parse($request->get('tgl_mulai'))->startOfDay();
            $end = Carbon::parse($request->get('tgl_akhir'))->endOfDay();
            $data = Kunjungan::whereIn('status', ['selesai', 'ditolak'])
            ->where('user_id', auth()->guard('web')->user()->id)
            ->whereBetween('tgl', [$start, $end])
            ->orderBy('tgl', 'DESC')->paginate(3);
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
                $nav = 'Data Kunjungan 0 - 0 Dari 0';
            }else{
                $nav = 'Data Kunjungan '. $data->toArray()['from'] .' - '.$data->toArray()['to'] .' Dari '.$data->toArray()['total'];
            }

            return response()->json([
                'current_page' => $data->toArray()['current_page'],
                'next_page' => $next,
                'prev_page' => $prev,
                'navigasi' => $nav,
                'html' => view('umum.kunjungan.data', compact('data'))->render(),
            ]);
        }
        return view('umum.kunjungan.riwayat');
    }

    public function bank(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = PPDBBank::orderBy('created_at', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = PPDBBank::where('name','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->name);
          }

          return response()->json($data);
    }

}
