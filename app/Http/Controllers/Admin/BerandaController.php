<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Visitor;
class BerandaController extends Controller
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
    public function index(){

        $data = array();
        $data['ppdb'] = '1';
        $data['berita'] = Post::latest()->get()->count();

        $data['totalVisits']               = Visitor::get();
        $data['totalUniqueVisitors']       = Visitor::whereYear('created_at', '=',  date('Y'))->whereMonth('created_at', '=', date('m'))->get();
        $count = 0;

        foreach($data['totalUniqueVisitors']->groupBy('ip') as $key => $visitor){
           $count += $visitor->groupBy('url')->count();
        }

        $data['totalUniqueVisits']         = $count;
        $data['totalUniqueVisitors']       = $data['totalUniqueVisitors']->groupBy('ip')->count();

        $data['totalVisitors']             = $data['totalVisits']->groupBy('ip')->count();
        $data['usageBrowsers']             = $data['totalVisits']->groupBy('agent_browser');

        $month = date('Y-m');
        $visitors = Visitor::whereYear('created_at', '=',  date('Y'))->whereMonth('created_at', '=', date('m'))->get();
        for($i = 1; $i <= date('t'); $i++){
            if ($i < 10) {
                $i = str_pad($i, 2, "0", STR_PAD_LEFT);
            }
            // visits count
            // $visits                    = $visitors->where('created_at', );
            $dt = date('Y-m-'.$i);
            $visits = $visitors->filter(function ($value) use ($dt) {
                return $value->created_at->isSameDay($dt);
            });
            $data['dates'][] = $i;
            $data['visits'][]          = $visits->count();
            //visitor count
            $data['visitors'][]        = $visits->groupBy('ip')->count();
        } 

        $data['dates']                 = implode(',', $data['dates']);
        $data['visits']                = implode(',', $data['visits']);
        $data['visitors']              = implode(',', $data['visitors']);
        // dd($data);

        return view('admin.beranda', compact('data'));
    }
}
