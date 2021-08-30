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

        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6> Carian Permohonan</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <form method="POST" action="/cari_penyokong_hq_tugasan_baru">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-sm" type="text" name="no_kp" placeholder="No Kad Pengenalan" />
                                </div>

                                <div class="col">
                                    <select class="form-control form-control-sm" name="negeri">
                                        <option value="null">--Pilih Negeri--</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                        <option value="WP Putrajaya">W. P. Putrajaya</option>
                                        <option value="WP Labuan">W. P. Labuan</option>
                                    </select>
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
                                    <button class="btn btn-sm btn-info text-uppercases text-white" type="submit"><i class="fas fa-search fa-2x"></i> Cari</button>
                                    <a href="/penyokong_hq_tugasan_baru" class="btn btn-sm btn-danger">Set Semula</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6> Tugasan Baru</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                            <label class="d-flex flex-nowrap mb-0">
                                <span class="pl-0 pt-2 pr-2">Papar</span>
                                <select name="datatable_length" aria-controls="datatable" class="col form-control form-control-sm" (change)="entriesChange($event)">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="-1">All</option>
                                </select>
                                <span class="p-2">rekod</span>
                            </label>
                        </div>
                        <div class="col form-group mb-0 p-0" id="datatable_search">
                            
                        </div>
                    </div>


                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">TARIKH Diterima</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">JENIS PERMOHONAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NAMA PEMOHON</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Permohonan Baharu/pembaharuan</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-danger"> Belum Disemak</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/hq-maklumat-pemohon">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Permohonan rayuan/pendua</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-danger"> Belum Disemak</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/hq-maklumat-pemohon-rayuan-pendua">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Permohonan Baharu/pembaharuan</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-success"> Telah Disemak PDRM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/hq-disemak-pdrm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->

        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6> Tugasan Baru</h6>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="row p-3 mb-0">
                        <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                            <label class="d-flex flex-nowrap mb-0">
                                <span class="pl-0 pt-2 pr-2">Papar </span>
                                <select name="datatable_length" aria-controls="datatable" class="col form-control form-control-sm" (change)="entriesChange($event)">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="-1">All</option>
                                </select>
                                <span class="p-2">rekod</span>
                            </label>
                        </div>
                        <div class="col form-group mb-0 p-0" id="datatable_search">


                        </div>
                    </div> -->


                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">TARIKH Diterima</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">JENIS PERMOHONAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NAMA PEMOHON</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($permohonan as $permohonan)
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">{{$permohonan->updated_at}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold">{{$permohonan->jenis_permohonan}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> {{$permohonan->nama}} </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$permohonan->no_kp}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$permohonan->negeri}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($permohonan->status_permohonan === 'hantar_ke_pemproses_hq')
                                            <span class="badge badge-danger"> Belum Disemak</span>
                                            @elseif ($permohonan->status_permohonan === 'disemak pdrm')
                                            <span class="badge badge-success"> Telah Disemak PDRM</span>
                                            @elseif ($permohonan->status_permohonan === 'hantar_ke_penyokong_hq')
                                            <span class="badge badge-warning"> Belum Disyorkan</span>
                                            @elseif ($permohonan->status_permohonan === 'disokong_hq' || $permohonan->status_permohonan === 'tidak_disokong_hq')
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

<script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js" type="text/javascript"></script>
<script type="text/javascript">
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
        searchable: false,
        fixedHeight: true
    });
</script>
@stop