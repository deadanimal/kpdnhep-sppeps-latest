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
                        <h6> Carian Log Pemohon</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="cari_log_pemohon">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="ic">No. Kad Pengenalan</label>
                                        <input class="form-control form-control-sm" type="number" name="no_kp" />
                                    </div>

                                    <div class="col">
                                        <br>
                                        <button class="btn btn-sm bg-gradient-info text-capitalize" type="submit"
                                            name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
                                        <a href="/log_pemohon" class="btn btn-sm btn-danger">Set Semula</a>
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
                        <h6> Senarai Pemohon</h6>
                    </div>

                    <div class="card-body p-3">
                        {{-- @foreach ($permohonan as $permohonan)
                            {{ gettype($permohonan->user_id) }}
                        @endforeach --}}


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Nama Pemohon</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Kad Pengenalan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NEGERI</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemohon as $pemohon)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pemohon->name }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pemohon->no_kp }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        @foreach ($permohonan as $permohonans)

                                                            {{-- {{ $permohonans->negeri_kutipan_permit }} --}}
                                                            @if ($pemohon->id == $permohonans->user_id)
                                                                {{-- {{ $pemohon->id }},
                                                                {{ $permohonans->user_id }} --}}
                                                                {{ $permohonans->negeri_kutipan_permit }} <br>
                                                                @break
                                                            @endif
                                                            
                                                        @endforeach
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/log_pemohon/{{ $pemohon->id }}"
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
    {{-- <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script> --}}


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
                        title: 'Senarai Pemohon'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Senarai Pemohon',
                        orientation: 'landscape',
                        // pageSize: 'LEGAL'
                    },

                ],
            });
        });
    </script>
@stop
