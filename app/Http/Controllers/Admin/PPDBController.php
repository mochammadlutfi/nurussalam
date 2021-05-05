<?php

namespace App\Http\Controllers\Admin;

use App\Models\PPDB;
use App\Models\PPDBBayar;
use App\Models\PPDBWali;
use App\Models\PPDBPeserta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            $data = PPDB::with('peserta', 'ustadz')
            ->whereBetween('created_at', [$request->tgl_mulai. " 00:00:00", $request->tgl_akhir." 23:59:59"])
            ->where('wali_id', 'like', '%' . $request->ustadz . '%')
            ->where('status', 'like', '%' . $request->status . '%')
            ->where('program', 'like', '%' . $request->program . '%')
            ->orderBy('created_at', 'DESC')->paginate(10);
            return response()->json($data);
        }
        return view('admin.ppdb.index');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id){
        
        $data = PPDB::where('id', $id)->first();

        return view('admin.ppdb.detail', compact('data'));
    }

}
