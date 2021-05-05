<?php

namespace App\Http\Controllers\PPDB;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use App\Models\Slider;
use App\Models\Visitor;
use App\Models\PPDB;
use App\Models\PPDBRekening;
use App\Models\PPDBWali;
use App\Models\PPDBBayar;
use App\Models\PPDBBank;
class CoreController extends Controller
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

        return view('ppdb.home');
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

    public function ustadz(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = PPDBWali::orderBy('created_at', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = PPDBWali::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }
}
