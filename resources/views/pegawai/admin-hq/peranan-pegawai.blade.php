@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5>Peranan Pegawai</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Pegawai </h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="text" name="search"
                                            placeholder="No Kad Pengenalan" />
                                    </div>

                                    <div class="col">
                                        <select class="form-control form-control-sm" aria-label="Default select example"
                                            name="negeri">
                                            <option selected>--Pilih Negeri--</option>
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
                                        <button class="btn btn-sm bg-gradient-info text-uppercases" type="submit"
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
                        <h6> Senarai Peranan Pegawai </h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <div class="col form-group d-flex justify-content-end mb-0 p-0" id="datatable_search">
                                <a class="btn btn-sm bg-gradient-info" href="/senarai_pegawai"><i
                                        class="fas fa-plus-circle"></i> Tambah</a>
                            </div>
                        </div>


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                NO KAD PENGENALAN</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NAMA Pegawai</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">No. Permit</th> -->
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NEGERI</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Jawatan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Peranan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawais as $pegawai)

                                            <tr class="text-center">
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pegawai->no_kp }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->name }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->negeri }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->jawatan }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        @foreach ($pegawai->roles as $role)
                                                            {{ $role->name }} <br>
                                                        @endforeach
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($pegawai->status === 'Aktif')
                                                        <span class="badge badge-success"> {{ $pegawai->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger"> {{ $pegawai->status }}</span>
                                                    @endif

                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/peranan_pegawai/{{ $pegawai->id }}">
                                                        <i class="fas fa-pencil-alt"></i>
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


{{-- @foreach ($pegawais as $pegawai)
    Name: {{$pegawai->name}}    
    @foreach ($pegawai->roles as $role)
        {{$role}}    
    @endforeach
@endforeach --}}
