<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class M_billing extends Model
{
    public static function getBillingData($mulai, $sampai, $request)
    {
        $query = DB::table('rawat_jl_drpr AS a')
            ->selectRaw("SUBSTRING(a.no_rawat, 1, 10) AS tgl_masuk,
                        a.no_rawat AS no_reg,
                        a.tgl_perawatan AS tgl_transaksi,
                        b.nm_perawatan AS tindakan,
                        c.nama AS nama_dokter,
                        d.nama AS nama_perawat,
                        f.nama_ruangan AS layanan,
                        b.material AS sarana,
                        b.tarif_tindakandr AS tarif_dokter,
                        b.tarif_tindakanpr AS tarif_perawat,
                        b.menejemen AS tarif_admin,
                        g.no_rkm_medis as no_mr,
                        i.nm_pasien AS nama_pasien,
                        h.png_jawab AS jaminan")
            ->join('jns_perawatan AS b', 'a.kd_jenis_prw', '=', 'b.kd_jenis_prw')
            ->join('pegawai AS c', 'a.kd_dokter', '=', 'c.nik')
            ->join('pegawai AS d', 'a.nip', '=', 'd.nik')
            ->leftJoin('petugas_ruang AS e', 'a.nip', '=', 'e.nik')
            ->leftJoin('ruangan AS f', 'e.kd_ruangan', '=', 'f.kd_ruangan')
            ->join('reg_periksa AS g', 'a.no_rawat', '=', 'g.no_rawat')
            ->join('penjab AS h', 'g.kd_pj', '=', 'h.kd_pj')
            ->join('pasien AS i', 'g.no_rkm_medis', '=', 'i.no_rkm_medis')
            ->whereBetween(DB::raw("DATE_FORMAT(SUBSTRING(a.no_rawat, 1, 10), '%Y-%m-%d')"), [$mulai, $sampai]);

        if ($request->has('kd_poli') && $request->kd_poli != '') {
            $query->where('g.kd_poli', $request->kd_poli);
        }
        if ($request->has('kd_pj') && $request->kd_pj != '') {
            $query->where('g.kd_pj', $request->kd_pj);
        }
        return $query->get();
    }
    public static function getBillingInap($mulai, $sampai, $request)
    {
        $query = DB::table('rawat_inap_drpr AS a')
            ->selectRaw("SUBSTRING(a.no_rawat, 1, 10) AS tgl_masuk,
                        a.no_rawat AS no_reg,
                        a.tgl_perawatan AS tgl_transaksi,
                        b.nm_perawatan AS tindakan,
                        c.nama AS nama_dokter,
                        d.nama AS nama_perawat,
                        f.nama_ruangan AS layanan,
                        b.material AS sarana,
                        b.tarif_tindakandr AS tarif_dokter,
                        b.tarif_tindakanpr AS tarif_perawat,
                        b.menejemen AS tarif_admin,
                        g.no_rkm_medis as no_mr,
                        i.nm_pasien AS nama_pasien,
                        h.png_jawab AS jaminan")
            ->join('jns_perawatan_inap AS b', 'a.kd_jenis_prw', '=', 'b.kd_jenis_prw')
            ->join('pegawai AS c', 'a.kd_dokter', '=', 'c.nik')
            ->join('pegawai AS d', 'a.nip', '=', 'd.nik')
            ->leftJoin('petugas_ruang AS e', 'a.nip', '=', 'e.nik')
            ->leftJoin('ruangan AS f', 'e.kd_ruangan', '=', 'f.kd_ruangan')
            ->join('reg_periksa AS g', 'a.no_rawat', '=', 'g.no_rawat')
            ->join('penjab AS h', 'g.kd_pj', '=', 'h.kd_pj')
            ->join('pasien AS i', 'g.no_rkm_medis', '=', 'i.no_rkm_medis')
            ->whereBetween(DB::raw("DATE_FORMAT(SUBSTRING(a.no_rawat, 1, 10), '%Y-%m-%d')"), [$mulai, $sampai]);

        if ($request->has('kd_pj') && $request->kd_pj != '') {
            $query->where('g.kd_pj', $request->kd_pj);
        }
        return $query->get();
    }
}