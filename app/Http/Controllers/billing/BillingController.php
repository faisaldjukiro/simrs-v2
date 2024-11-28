<?php

namespace App\Http\Controllers\billing;

use App\Http\Controllers\Controller;
use App\Models\M_billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class BillingController extends Controller
{
    public function index(Request $request)
    {
        $mulai = $request->input('mulai', date('Y-m-d'));
        $sampai = $request->input('sampai', date('Y-m-d'));
        $data['bayar'] = DB::table('penjab')
            ->orderBy('png_jawab', 'ASC')
            ->where('status', '1')
            ->get();
        $data['poli'] = DB::table('poliklinik')
            ->orderBy('nm_poli', 'ASC')
            ->where('status', '1')
            ->get();
        $data['billing'] = M_billing::getBillingData($mulai, $sampai, $request);
        return view('billing.rawat-jalan', $data);
    }
    public function exportExcel(Request $request)
    {
        $mulai = $request->input('mulai');
        $sampai = $request->input('sampai');

        if (!$mulai || !$sampai) {
            return response()->json(['error' => 'Tanggal tidak ditemukan'], 400);
        }

        $billing = M_billing::getBillingData($mulai, $sampai, $request);

        $header = [
            'No', 'No Rawat', 'Tgl Transaksi', 'Rekamedik', 'Nama Pasien',
            'Tindakan', 'Nama Dokter', 'Nama Perawat', 'Layanan',
            'Sarana', 'Tarif Dokter', 'Tarif Perawat', 'Tarif Admin', 'Jaminan'
        ];

        $rows = [];
        foreach ($billing as $key => $jl) {
            $rows[] = [
                $key + 1,
                $jl->no_reg,
                $jl->tgl_transaksi,
                $jl->no_mr,
                $jl->nama_pasien,
                $jl->tindakan,
                $jl->nama_dokter,
                $jl->nama_perawat,
                $jl->layanan,
                $jl->sarana, 
                $jl->tarif_dokter,
                $jl->tarif_perawat, 
                $jl->tarif_admin, 
                $jl->jaminan,
            ];
        }

        $callback = function () use ($header, $rows) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $header);
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, [
            "Content-Type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=billing.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ]);
        return redirect('billing/rawat-jalan')->with('file', $filename);
    }

    public function inap(Request $request)
    {
        $mulai = $request->input('mulai', date('Y-m-d'));
        $sampai = $request->input('sampai', date('Y-m-d'));
        $data['bayar'] = DB::table('penjab')
            ->orderBy('png_jawab', 'ASC')
            ->where('status', '1')
            ->get();
        $data['billing'] = M_billing::getBillingInap($mulai, $sampai, $request);
        return view('billing.rawat-inap', $data);
    }
    public function exportExcelInap(Request $request)
    {
        $mulai = $request->input('mulai');
        $sampai = $request->input('sampai');

        if (!$mulai || !$sampai) {
            return response()->json(['error' => 'Tanggal tidak ditemukan'], 400);
        }

        $billing = M_billing::getBillingInap($mulai, $sampai, $request);

        $header = [
            'No', 'No Rawat', 'Tgl Transaksi', 'Rekamedik', 'Nama Pasien',
            'Tindakan', 'Nama Dokter', 'Nama Perawat', 'Layanan',
            'Sarana', 'Tarif Dokter', 'Tarif Perawat', 'Tarif Admin', 'Jaminan'
        ];

        $rows = [];
        foreach ($billing as $key => $jl) {
            $rows[] = [
                $key + 1,
                $jl->no_reg,
                $jl->tgl_transaksi,
                $jl->no_mr,
                $jl->nama_pasien,
                $jl->tindakan,
                $jl->nama_dokter,
                $jl->nama_perawat,
                $jl->layanan,
                $jl->sarana, 
                $jl->tarif_dokter,
                $jl->tarif_perawat, 
                $jl->tarif_admin, 
                $jl->jaminan,
            ];
        }

        $callback = function () use ($header, $rows) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $header);
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, [
            "Content-Type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=billing.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ]);
        return redirect('billing/rawat-inap')->with('file', $filename);
    }
}