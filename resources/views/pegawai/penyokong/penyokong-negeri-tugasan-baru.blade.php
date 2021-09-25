@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">
            {{-- {{ auth()->user()->role }} --}}
            {{-- {{Auth::user()->roles}} --}}
            {{-- @foreach (auth()->user()->roles as $role)
                {{ $role->name }}
            @endforeach --}}

            <div>
                <h5>Sokongan Permohonan</h5>
            </div>

            {{-- {{ auth()->user()->role }} --}}
            {{-- {{ Auth::user()->role }} --}}


            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Permohonan</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">

                            {{-- @foreach (auth()->user()->roles as $role)
                                @if($role->name ) 

                                @endif
                            @endforeach --}}
                            <form method="POST" action="/cari_penyokong_negeri_tugasan_baru">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="text" name="no_kp" id="no_kp"
                                            placeholder="No Kad Pengenalan" />
                                    </div>
                                    <div class="col">
                                        <select class="form-control form-control-sm" name="jenis_permohonan">
                                            <option value="null">Pilih Jenis Permohonan</option>
                                            <option value="Baharu">Permohonan Baharu</option>
                                            <option value="Pembaharuan">Permohonan Pembaharuan</option>
                                            <option value="Pendua">Permohonan Pendua</option>
                                            <option value="Rayuan">Permohonan Rayuan</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-sm btn-info text-uppercases text-white" type="submit"
                                            name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
                                        <a href="/penyokong_negeri_tugasan_baru" class="btn btn-sm btn-danger">Set Semula</a>
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
                        <h6> Tugasan Baru</h6>
                    </div>

                    <div class="card-body p-3">

                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Tarikh Diterima</th>
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
                                                Status</th>
                                            <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($permohonan as $permohonan)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ date('d-m-Y', strtotime($permohonan->updated_at)) }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $permohonan->jenis_permohonan }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $permohonan->nama }} </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $permohonan->no_kp }}</span>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    @if ($permohonan->status_permohonan === 'hantar')
                                                        <span class="badge badge-danger"> Belum Disemak</span>
                                                    @elseif ($permohonan->status_permohonan ===
                                                        'hantar_ke_penyokong_negeri')
                                                        <span class="badge badge-warning"> Belum Disyorkan</span>
                                                    @elseif ($permohonan->status_permohonan ===
                                                        'disokong_negeri' || $permohonan->status_permohonan ===
                                                        'tidak_disokong_negeri')
                                                        <span class="badge badge-warning"> Dalam Pertimbangan</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="permohonan/{{ $permohonan->id }}">
                                                        <i class="fas fa-edit"></i>
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

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>


@stop
