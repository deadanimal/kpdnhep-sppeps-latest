@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5>Audit Trails</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Log Pengguna</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="/cari_log_pengguna">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="tarikhmula">No. Kad Pengenalan</label>
                                        <input class="form-control form-control-sm" type="text" name="no_kp" />
                                    </div>
                                    {{-- <div class="col">
                                        <label for="tarikhmula">Tarikh Mula</label>
                                        <input class="form-control form-control-sm" type="date" name="tarikhmula" />
                                    </div>

                                    <div class="col">
                                        <label for="tarikhtamat">Tarikh Tamat</label>
                                        <input class="form-control form-control-sm" type="date" name="tarikhtamat" />
                                    </div> --}}

                                    <div class="col">
                                        <br>
                                        <button class="btn btn-sm bg-gradient-info text-capitalize" type="submit"
                                            name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Senarai Pengguna</h6>
                    </div>

                    <div class="card-body p-3">

                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                No. Kad Pengenalan</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Nama Pengguna</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                E-mel</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Status</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NEGERI</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Jawatan</th>
                                            {{-- <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                tarikh terakhir login</th> --}}
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                peranan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawais as $pegawai)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pegawai->no_kp }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pegawai->name }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->email }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        <span class="badge badge-success"> {{ $pegawai->status }}</span>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->negeri }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{ $pegawai->jawatan }}
                                                </td>
                                                {{-- <td class="align-middle text-center text-sm">
                                                    15/02/2021 12:09:13
                                                </td> --}}
                                                <td class="align-middle text-center text-sm">
                                                    {{ $pegawai->role }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/log_pengguna/{{ $pegawai->id }}"
                                                        class="btn btn-sm bg-gradient-info">
                                                        Lihat Log
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Senarai Pengguna'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Senarai Pengguna',
                        orientation: 'landscape',
                        // pageSize: 'LEGAL'
                    },

                ],
            });
        });
    </script>
@stop
