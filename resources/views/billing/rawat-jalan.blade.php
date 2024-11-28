@extends('layouts.app')
@section('title', 'Billing Rawat Jalan')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                    <h3>@yield('title')</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('billing-jalan') }}">Billing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rawat Jalan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <form class="d-inline-flex align-items-center" action="{{ route('billing-jalan') }}" method="GET"
                            id="filterForm">
                            <input type="date" class="form-control form-control" name="mulai" id="mulai"
                                value="{{ request('mulai', date('Y-m-d')) }}" placeholder="Dari">

                            <label class="ms-1">s.d</label>

                            <input type="date" class="form-control form-control ms-1" name="sampai" id="sampai"
                                value="{{ request('sampai', date('Y-m-d')) }}" placeholder="Sampai">

                            <select class="form-select form-control ms-1" name="kd_poli" id="kd_poli">
                                <option value="" disabled selected>Pilih Poliklinik</option>
                                @foreach ($poli as $item)
                                    <option value="{{ $item->kd_poli }}"
                                        {{ request('kd_poli') == $item->kd_poli ? 'selected' : '' }}>
                                        {{ $item->nm_poli }}
                                    </option>
                                @endforeach
                            </select>

                            <select class="form-select form-control ms-1" name="kd_pj" id="kd_pj">
                                <option value="" disabled selected>Pilih Jaminan</option>
                                @foreach ($bayar as $item)
                                    <option value="{{ $item->kd_pj }}"
                                        {{ request('kd_pj') == $item->kd_pj ? 'selected' : '' }}>
                                        {{ $item->png_jawab }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="reset" class="btn btn-danger ms-1 btn-sm" title="Clear Filter Data"
                                onclick="window.location.href='{{ route('billing-jalan') }}'"><i
                                    class="bi bi-x"></i></button>
                            <button class="btn btn-warning btn-sm ms-1" title="Filter Data">
                                <i class="bi bi-filter"></i>
                            </button>
                        </form>
                        <div class="toast" id="toast"
                            style="position: fixed; top: 20px; right: 20px; display: none; z-index: 9999; background-color: red; color: white;">
                            <div class="toast-body">
                                Rentang tanggal tidak boleh lebih dari <b>1 Bulan!</b>
                            </div>
                        </div>
                    </div>
                    <div>

                        <button class="btn btn-success btn-sm" onclick="exportBilling()" title="Export Data">
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        </button>

                        <a href="" class="ms-1">
                            <button class="btn btn-primary btn-sm" title="Tambah Data">
                                <i class="bi bi-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Rawat</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Rekamedik</th>
                                    <th>Nama Pasien</th>
                                    <th>Tindakan</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama Perawat</th>
                                    <th>Layanan</th>
                                    <th>Sarana</th>
                                    <th>Tarif Dokter</th>
                                    <th>Tarif Perawat</th>
                                    <th>Tarif Admin</th>
                                    <th>Jaminan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billing as $key => $jl)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $jl->no_reg }}</td>
                                        <td>{{ $jl->tgl_transaksi }}</td>
                                        <td>{{ $jl->no_mr }}</td>
                                        <td>{{ $jl->nama_pasien }}</td>
                                        <td>{{ $jl->tindakan }}</td>
                                        <td>{{ $jl->nama_dokter }}</td>
                                        <td>{{ $jl->nama_perawat }}</td>
                                        <td>{{ $jl->layanan }}</td>
                                        <td>{{ formatRupiah($jl->sarana) }}</td>
                                        <td>{{ formatRupiah($jl->tarif_dokter) }}</td>
                                        <td>{{ formatRupiah($jl->tarif_perawat) }}</td>
                                        <td>{{ formatRupiah($jl->tarif_admin) }}</td>
                                        <td>{{ $jl->jaminan }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <script>
        document.getElementById('filterForm').addEventListener('submit', function(event) {
            const mulai = document.getElementById('mulai').value;
            const sampai = document.getElementById('sampai').value;

            if (mulai && sampai) {
                const startDate = new Date(mulai);
                const endDate = new Date(sampai);

                const diffTime = Math.abs(endDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                if (diffDays > 31) {
                    event.preventDefault();
                    showToast();
                }
            }
        });

        function showToast() {
            const toast = document.getElementById('toast');
            toast.style.display = 'block';
            setTimeout(function() {
                toast.style.display = 'none';
            }, 3000);
        }

        function exportBilling() {
            const mulai = document.getElementById('mulai').value;
            const sampai = document.getElementById('sampai').value;
            const kd_poli = document.getElementById('kd_poli').value;
            const kd_pj = document.getElementById('kd_pj').value;
            window.location.href =
                `{{ route('export.csv') }}?mulai=${mulai}&sampai=${sampai}&kd_poli=${kd_poli}&kd_pj=${kd_pj}`;
        }
    </script>
@endsection
