<?php

namespace App\Http\Controllers\Admin;

use Config;
use App\Models\Menu;
use App\Models\MenuItems;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class PengaturanController extends Controller
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

    public function umum(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.pengaturan.umum');
        }else{
            $rules = [
                'app_name' => 'required',
                'app_description' => 'required',
            ];
            $pesan = [
                'app_name.required' => 'Nama S Wajib Diisi!',
                'app_description.required' => 'Slug Movie Wajib Diisi!',
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()){
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            }else{
                $app_name = DB::table('settings')
                    ->where('key', 'app_name')
                    ->update(['value' => $request->app_name]);

                $app_description = DB::table('settings')
                    ->where('key', 'app_description')
                    ->update(['value' => $request->app_description]);

                $app_description = DB::table('settings')
                    ->where('key', 'app_url')
                    ->update(['value' => $request->app_url]);

                if(!empty($request->file('app_logo')))
                {
                    Storage::disk('public')->delete(settings()->get('app_logo'));
                    $img = $request->file('app_logo');
                    $logo = Storage::disk('public')->put('uploads/logo', $img);

                    $app_logo = DB::table('settings')
                        ->where('key', 'app_logo')
                        ->update(['value' => $logo]);
                }

                if(!empty($request->file('app_favicon')))
                {
                    File::delete(settings()->get('app_favicon'));
                    $icon = $request->file('app_favicon');
                    $favicon = Storage::disk('public')->put('uploads/logo', $icon);

                    $app_favicon = DB::table('settings')
                    ->where('key', 'app_favicon')
                    ->update(['value' => $favicon]);
                }
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function kontak(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.pengaturan.kontak');
        }else{
            DB::beginTransaction();
            try{
                $phone = DB::table('settings')
                    ->where('key', 'kontak_phone')
                    ->update(['value' => $request->phone]);

                $phone2 = DB::table('settings')
                    ->where('key', 'kontak_phone_opt')
                    ->update(['value' => $request->phone2]);

                $alamat = DB::table('settings')
                    ->where('key', 'kontak_alamat')
                    ->update(['value' => $request->alamat]);

                $email = DB::table('settings')
                    ->where('key', 'kontak_email')
                    ->update(['value' => $request->email]);

                $email2 = DB::table('settings')
                    ->where('key', 'kontak_email_opt')
                    ->update(['value' => $request->email2]);

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
            ]);

        }
    }

    public function sosmed(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.pengaturan.sosmed');
        }else{
            DB::beginTransaction();

            try{

                $facebook = DB::table('settings')
                    ->where('key', 'social_facebook')
                    ->update(['value' => $request->social_facebook]);

                $instagram = DB::table('settings')
                    ->where('key', 'social_instagram')
                    ->update(['value' => $request->social_instagram]);

                $twitter = DB::table('settings')
                    ->where('key', 'social_twitter')
                    ->update(['value' => $request->social_twitter]);

                $youtube = DB::table('settings')
                    ->where('key', 'social_youtube')
                    ->update(['value' => $request->social_youtube]);

                $linkedin = DB::table('settings')
                    ->where('key', 'social_linkedin')
                    ->update(['value' => $request->social_linkedin]);

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
            ]);

        }
    }

    public function smtp(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.pengaturan.smtp');
        }else{
            $smtp_server = DB::table('settings')
            ->where('key', 'smtp_server')
            ->update(['value' => $request->smtp_server]);

            $smtp_username = DB::table('settings')
                ->where('key', 'smtp_username')
                ->update(['value' => $request->smtp_username]);

            $smtp_password = DB::table('settings')
                ->where('key', 'smtp_password')
                ->update(['value' => $request->smtp_password]);

            $smtp_port = DB::table('settings')
                ->where('key', 'smtp_port')
                ->update(['value' => $request->smtp_port]);

            $smtp_crypt = DB::table('settings')
                ->where('key', 'smtp_crypt')
                ->update(['value' => $request->smtp_crypt]);

            $env_update = $this->changeEnv([
                'MAIL_HOST'   => $request->smtp_server,
                'MAIL_PORT'   => $request->smtp_port,
                'MAIL_USERNAME' => $request->smtp_username,
                'MAIL_PASSWORD' => $request->smtp_password,
                'MAIL_ENCRYPTION' => $request->smtp_crypt
            ]);
            if($env_update){
                return response()->json([
                    'fail' => false,
                ]);
            } else {
                return response()->json([
                    'fail' => true,
                ]);
            }
        }
    }

    protected function changeEnv($data = array()){
        if(count($data) > 0){

            // Baca file .env
            $env = file_get_contents(base_path() . '/.env');

            // pisahkan string di setiap " " dan ubah ke dalam array
            $env = preg_split('/\s+/', $env);;

            // looping berdasarkan jumlah data
            foreach((array)$data as $key => $value){

                // Looping berdasarkan .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

}
