@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="wrapper">
            <div id="formContent">

                <div class="p-3">

                    <div>
                        <h5>Tambah Senarai Hitam Permohonan</h5>
                    </div>

                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f5e7f2;">
                                <h6> Carian Pemohon</h6>
                            </div>

                            <div class="card-body p-3">
                                <form method="POST" action="">
                                    @csrf

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="No Kad Pengenalan">
                                        </div>
                                        <div class="col">
                                            <input type="submit" class="btn btn-info">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f5e7f2;">
                                <h6> Senarai Pemohon</h6>
                            </div>

                            <div class="card-body p-3">



                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0" id="datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                        No.</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                        TARIKH PERMOHONAN</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        JENIS PERMOHONAN</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        NAMA PEMOHON</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        NO KAD PENGENALAN</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        NEGERI</th>
                                                    <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">catatan</th> -->
                                                    <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">TINDAKAN PEGAWAI</th> -->
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        Status</th>
                                                    <th class="text-uppercase text-center text-secondary text-xs opacity-7">
                                                        Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permohonan as $permohonan)
                                                    <tr>
                                                        <td>
                                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-secondary text-sm font-weight-bold">{{ $permohonan->created_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $permohonan->jenis_permohonan }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">{{ $permohonan->nama }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-sm font-weight-bold">{{ $permohonan->no_kp }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $permohonan->negeri }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-success"> Diluluskan</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button class="btn btn-sm btn-danger btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#modal-form2">
                                                                Batal Permit
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{-- <tr>
                                                    <td>
                                                        <span class="text-secondary text-sm font-weight-bold">1</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-secondary text-sm font-weight-bold">22/11/2021
                                                            10:39:12</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-secondary text-sm font-weight-bold"> Permohonan
                                                            Baharu</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-secondary text-sm font-weight-bold"> Abu
                                                            Samad</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-sm font-weight-bold">981209089989</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-secondary text-sm font-weight-bold">
                                                            Selangor</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-success"> Diluluskan</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button class="btn btn-sm btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modal-form2">
                                                            Batal Permit
                                                        </button>
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="h4 font-weight-bolder text-info text-gradient">Pembatalan Permit</h3>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">

                                    <div class="row">

                                        <label>Catatan</label>

                                        <div class="input-group mb-3">
                                            <textarea class="form-control" id="catatan" name="catatan"
                                                [(ngModel)]="this.catatan"></textarea>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-round bg-gradient-danger text-capitalize"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="Submit"
                                            class="btn btn-round bg-gradient-success text-capitalize">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>
@stop
