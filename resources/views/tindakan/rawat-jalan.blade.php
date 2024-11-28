@extends('layouts.app')
@section('title', 'Tindakan Rawat Jalan')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                    <h3>@yield('title', 'Dashboard')</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable jQuery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <!-- Form Filter Data dengan Select Option yang lebih kecil di kiri -->
                        <form class="d-inline-flex align-items-center">
                            <select class="form-select form-select-sm" aria-label="Filter Data">
                                <option selected>Pilih Kategorif</option>
                                <option value="1">Kategori 1</option>
                                <option value="2">Kategori 2</option>
                                <option value="3">Kategori 3</option>
                            </select>
                            <select class="form-select form-select-sm ms-1" aria-label="Filter Data">
                                <option selected>Pilih Kategori</option>
                                <option value="1">Kategori 1</option>
                                <option value="2">Kategori 2</option>
                                <option value="3">Kategori 3</option>
                            </select>

                            <button class="btn btn-warning btn-sm ms-1" title="Filter Data">
                                <i class="bi bi-filter"></i>
                            </button>
                        </form>
                    </div>
                    <div>
                        <!-- Tombol Export dan Tambah Data di kanan -->
                        <a href="">
                            <button class="btn btn-success btn-sm" title="Export Data">
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            </button>
                        </a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Graiden</td>
                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                    <td>076 4820 8838</td>
                                    <td>Offenburg</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dale</td>
                                    <td>fringilla.euismod.enim@quam.ca</td>
                                    <td>0500 527693</td>
                                    <td>New Quay</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nathaniel</td>
                                    <td>mi.Duis@diam.edu</td>
                                    <td>(012165) 76278</td>
                                    <td>Grumo Appula</td>
                                    <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Darius</td>
                                    <td>velit@nec.com</td>
                                    <td>0309 690 7871</td>
                                    <td>Ways</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Oleg</td>
                                    <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                    <td>0500 441046</td>
                                    <td>Rossignol</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kermit</td>
                                    <td>diam.Sed.diam@anteVivamusnon.org</td>
                                    <td>(01653) 27844</td>
                                    <td>Patna</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jermaine</td>
                                    <td>sodales@nuncsit.org</td>
                                    <td>0800 528324</td>
                                    <td>Mold</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ferdinand</td>
                                    <td>gravida.molestie@tinciduntadipiscing.org</td>
                                    <td>(016977) 4107</td>
                                    <td>Marlborough</td>
                                    <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kuame</td>
                                    <td>Quisque.purus@mauris.org</td>
                                    <td>(0151) 561 8896</td>
                                    <td>Tresigallo</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deacon</td>
                                    <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                    <td>07740 599321</td>
                                    <td>Karapınar</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Channing</td>
                                    <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                                    <td>0845 46 49</td>
                                    <td>Warrnambool</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aladdin</td>
                                    <td>sem.ut@pellentesqueafacilisis.ca</td>
                                    <td>0800 1111</td>
                                    <td>Bothey</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cruz</td>
                                    <td>non@quisturpisvitae.ca</td>
                                    <td>07624 944915</td>
                                    <td>Shikarpur</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keegan</td>
                                    <td>molestie.dapibus@condimentumDonecat.edu</td>
                                    <td>0800 200103</td>
                                    <td>Assen</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ray</td>
                                    <td>placerat.eget@sagittislobortis.edu</td>
                                    <td>(0112) 896 6829</td>
                                    <td>Hofors</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Maxwell</td>
                                    <td>diam@dapibus.org</td>
                                    <td>0334 836 4028</td>
                                    <td>Thane</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carter</td>
                                    <td>urna.justo.faucibus@orci.com</td>
                                    <td>07079 826350</td>
                                    <td>Biez</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stone</td>
                                    <td>velit.Aliquam.nisl@sitametrisus.com</td>
                                    <td>0800 1111</td>
                                    <td>Olivar</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berk</td>
                                    <td>fringilla.porttitor.vulputate@taciti.edu</td>
                                    <td>(0101) 043 2822</td>
                                    <td>Sanquhar</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Philip</td>
                                    <td>turpis@euenimEtiam.org</td>
                                    <td>0500 571108</td>
                                    <td>Okara</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kibo</td>
                                    <td>feugiat@urnajustofaucibus.co.uk</td>
                                    <td>07624 682306</td>
                                    <td>La Cisterna</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bruno</td>
                                    <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                                    <td>07624 869434</td>
                                    <td>Rocca d"Arce</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leonard</td>
                                    <td>blandit.enim.consequat@mollislectuspede.net</td>
                                    <td>0800 1111</td>
                                    <td>Lobbes</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hamilton</td>
                                    <td>mauris@diam.org</td>
                                    <td>0800 256 8788</td>
                                    <td>Sanzeno</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harding</td>
                                    <td>Lorem.ipsum.dolor@etnetuset.com</td>
                                    <td>0800 1111</td>
                                    <td>Obaix</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emmanuel</td>
                                    <td>eget.lacus.Mauris@feugiatSednec.org</td>
                                    <td>(016977) 8208</td>
                                    <td>Saint-Remy-Geest</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
