<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
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
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // echo ';asdknaskd';
        // $bisnis_id = Session::get('bisnis.bisnis_id');
        $date_filters['this_month']['start'] = date('Y-m-01');
        $date_filters['this_month']['end'] = date('Y-m-t');
        $date_filters['this_week']['start'] = date('Y-m-d', strtotime('monday this week'));
        $date_filters['this_week']['end'] = date('Y-m-d', strtotime('sunday this week'));

        return view('mitra.beranda', compact(
            'date_filters'
        ));
    }

    /**
     * Retrieves purchase and sell details for a given time period.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTotal(Request $request)
    {
        if (request()->ajax()) {
            $start = $request->start;
            $end = $request->end;
            $bisnis_id = request()->session()->get('bisnis.bisnis_id');
            $outlet_id = request()->session()->get('bisnis.outlet_id');

            $pembelian = $this->transUtil->getTotalPembelian($bisnis_id, $start, $end, $outlet_id);

            $penjualan = $this->transUtil->getTotalPenjualan($bisnis_id, $start, $end, $outlet_id);

            $tipe_transaksi = [
                'retur_beli', 'penyesuaian_stok', 'retur_jual', 'pengeluaran'
            ];

            $transaksi_total = $this->transUtil->getTotalTransaksi(
                $bisnis_id,
                $tipe_transaksi,
                $start,
                $end,
                $outlet_id
            );

            $total_pembelian_inc_tax = !empty($pembelian['total_with_pajak']) ? $pembelian['total_with_pajak'] : 0;
            $total_retur_beli_inc_tax = $transaksi_total['total_beli_return_inc_tax'];
            $total_adjustment = $transaksi_total['total_adjustment'];

            $total_purchase = $total_pembelian_inc_tax - $total_retur_beli_inc_tax - $total_adjustment;
            $output = $pembelian;
            $output['total_pembelian'] = $total_purchase;

            $total_sell_inc_tax = !empty($penjualan['total_sell_inc_tax']) ? $penjualan['total_sell_inc_tax'] : 0;
            $total_sell_return_inc_tax = !empty($transaksi_total['total_sell_return_inc_tax']) ? $transaksi_total['total_sell_return_inc_tax'] : 0;

            $output['penghasilan_kotor'] = $total_sell_inc_tax - $total_sell_return_inc_tax;
            $output['total_transaksi_jual'] = !empty($penjualan['total_transaksi']) ? $penjualan['total_transaksi'] : 0;

            // $output['invoice_due'] = $penjualan['invoice_due'];
            // $output['total_expense'] = $transaksi_total['total_expense'];

            return $output;
        }
    }
}
