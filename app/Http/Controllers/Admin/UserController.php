<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
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
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function($row){
                    $nama  = '<span class="text-bold">'.$row->nip.'</span><br>';
                    $nama .= '<span>'.$row->nama.'</span>';

                    return $nama;
                })
                ->addColumn('jenis', function($row){
                    $jabatan = 'Sekretariat DPRD<br>';
                    $jabatan .= 'Kota Bandung';
                    return $jabatan;
                })
                ->addColumn('last_login', function($row){

                    return $row->last_login_at;
                })
                ->rawColumns(['nama', 'action', 'jenis', 'last_login'])
                ->make(true);
        }
        return view('admin.user.index');
    }


    public function simpan(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'konf_password' => 'required',
            'jabatan' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'username.required' => 'Username Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'konf_password.required' => 'Konfirmasi Password Wajib Diisi!',
            'jabatan.required' => 'Jabatan Wajib Diisi!',
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
                $data = new Admin();
                $data->nama = $request->nama;
                $data->username = $request->username;
                $data->email = $request->email;
                $data->password = bcrypt($request->password);
                $data->save();

                $data->assignRole($request->jabatan);

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
                'pesan' => 'Pengguna Baru Berhasil Ditambahkan!'
            ]);
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'username.required' => 'Username Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'jabatan.required' => 'Jabatan Wajib Diisi!',
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
                $data = Admin::find($request->id);
                $data->nama = $request->nama;
                $data->username = $request->username;
                $data->email = $request->email;
                $data->password = bcrypt($request->password);
                $data->save();

                $data->assignRole($request->jabatan);

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
                'pesan' => 'Data Pengguna Berhasil Diperbaharui!'
            ]);
        }
    }

    public function edit($id){

        $data = Admin::find($id);
        if($data){

            $user = collect([
                'id' => $data->id,
                'nama' => $data->nama,
                'username' => $data->username,
                'email' => $data->email,
                'jabatan' => $data->getRoleNames()->first(),
            ]);

            return response()->json($user);
        }
    }

    public function hapus($id)
    {
        $user = Admin::destroy($id);
        if($user){
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
