@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5> Peranan Pegawai</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Pegawai</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="/cari_pegawai_insid">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="text" name="no_kp"
                                            placeholder="No Kad Pengenalan" />
                                    </div>

                                    <div class="col">
                                        <button class="btn btn-sm bg-gradient-info text-uppercases" type="submit"
                                            name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>


@stop
