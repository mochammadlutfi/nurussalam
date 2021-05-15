<?php

namespace App\Http\Controllers\PPDB\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\PPDBPeserta;
class RegisterController extends Controller
{

    /**
     * Constructor
     *
     * @param ProductUtils $product
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Shows registration form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ppdb.auth.daftar');
    }

    /**
     * Handles the registration of a new business and it's owner
     *
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            // 'password_confirmation' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Bisnis Wajib Diisi!',
            'email.required' => 'Alamat Email Wajib Diisi!',
            // 'password.required' => 'Kata Sandi Wajib Diisi!',
            // 'password_confirmation.required' => 'Konfirmasi Kata Sandi Wajib Diisi!',
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
                $user = new PPDBPeserta();
                $user->nama = $request->nama;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                $user->sendEmailVerificationNotification();

                auth()->guard('web')->attempt($request->only('email','password'));

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
                'email' => $user->email
            ]);
        }
    }

    /**
     * Handles the validation username
     *
     * @return \Illuminate\Http\Response
     */
    public function postCheckUsername(Request $request)
    {
        $username = $request->input('username');

        if (!empty($request->input('username_ext'))) {
            $username .= $request->input('username_ext');
        }

        $count = User::where('username', $username)->count();
        if ($count == 0) {
            echo "true";
            exit;
        } else {
            echo "false";
            exit;
        }
    }

    /**
     * Handles the validation email
     *
     * @return \Illuminate\Http\Response
     */
    public function postCheckEmail(Request $request)
    {
        $email = $request->input('email');

        $query = User::where('email', $email);

        if (!empty($request->input('user_id'))) {
            $user_id = $request->input('user_id');
            $query->where('id', '!=', $user_id);
        }

        $exists = $query->exists();
        if (!$exists) {
            echo "true";
            exit;
        } else {
            echo "false";
            exit;
        }
    }
}
