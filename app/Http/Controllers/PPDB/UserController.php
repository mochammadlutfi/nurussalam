<?php

namespace App\Http\Controllers\PPDB;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\PPDBPeserta;
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
    }

    /**
     * Show User Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('ppdb.user.profil');
    }



    /**
     * Change User Password.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(){

        return view('ppdb.user.password');
    }

    /**
     * Change User Password.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePW(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'confirmed|max:8|different:old_password',
        ];

        $pesan = [
            'old_password.required' => 'Password Lama Wajib Diisi!',
            'password.required' => 'Password Baru Wajib Diisi!',
            'password_confirmation.required' => 'Konfirmasi Password Wajib Diisi!',
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

                $hashedPassword = Auth::guard('web')->user()->password;
                if (\Hash::check($request->old_password , $hashedPassword )) {
                    if (!\Hash::check($request->password , $hashedPassword)) {
                        $users = PPDBPeserta::find(Auth::guard('web')->user()->id);
                        $users->password = bcrypt($request->password);
                        $users->save();
                    }else{
                        return response()->json([
                            'fail' => true,
                            'errors' => array('old_password' => array('Password Lama Tidak Dapat Digunakan Kembali!'))
                        ]);
                    }
                }else{
                    return response()->json([
                        'fail' => true,
                        'errors' => array('old_password' => array('Password Lama Tidak Sama!'))
                    ]);
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

}
