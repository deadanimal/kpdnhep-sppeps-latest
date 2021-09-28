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
                        <div class="row">
                            <div class="col">

                                <h6>Log Pengguna</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
    
                                <a href="/log_pengguna" class="btn btn-info btn-sm">
                                    Kembali
                                </a>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col">
                                @foreach ($pegawais as $pegawai)
                                    <p>ID Pengguna: {{ $pegawai->id }}</p>
                                    <p>No. Kad Pengenalan : {{ $pegawai->no_kp }}</p>
                                    <p>Nama Pengguna : {{ $pegawai->name }}</p>
                                    <p>Status :
                                        @if ( $pegawai->status === "1")
                                            Aktif
                                        @elseif ( $pegawai->status === "0")
                                            Tidak Aktif
                                        @endif 
                                    </p>
                                    {{-- <p>Log Masuk Terakhir : 13/08/2021 10:23</p> --}}
                                    <p>Peranan : <br>
                                        @foreach ($pegawai->roles as $role)

                                            @if ($role->name === 'pemproses_negeri')
                                                Pemproses Negeri
                                            @elseif ($role->name === "penyokong_negeri")
                                                Penyokong Negeri
                                            @elseif ($role->name === "pelulus_negeri")
                                                Pelulus Negeri
                                            @elseif ($role->name === "pemproses_hq")
                                                Pemproses HQ
                                            @elseif ($role->name === "penyokong_hq")
                                                Penyokong HQ
                                            @elseif ($role->name === "pelulus_hq")
                                                Pelulus HQ
                                            @else
                                                {{ $role->name }}
                                            @endif
                                            <br>
                                        @endforeach
                                    </p>
                                @endforeach
                            </div>

                        </div>


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                tarikh</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">tindakan</th> -->
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($audits as $audit)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $audit->created_at }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-secondary text-sm font-weight-bold">
                                                        {{ $audit->description }}
                                                    </p>
                                                    <p class="text-secondary text-sm font-weight-bold">
                                                        {{ $audit->info_pemohon }}
                                                    </p>
                                                </td>

                                            </tr>
                                        @endforeach

                                        {{-- <tr>
                                            <td>
                                                <span class="text-secondary text-sm font-weight-bold">1</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    15/01/2021 10:23
                                                </span>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    Semakan Permohonan
                                                </span>
                                            </td>

                                        </tr> --}}

                                        {{-- <tr>
                                            <td>
                                                <span class="text-secondary text-sm font-weight-bold">1</span>
                                            </td>
                                            <td>
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    15/01/2021 10:23
                                                </span>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    Semakan Permohonan
                                                </span>
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

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
