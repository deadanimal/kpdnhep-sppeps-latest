@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">
            <div>
                <h4>Pengumuman</h4>
            </div>



            <div class="card card-frame">

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row d-flex flex-nowrap">
                        <div class="col row-align-center">
                            <h5>Senarai Pengumuman</h5>
                        </div>

                    </div>

                    <div class="col">
                        <div class="col d-flex justify-content-end">
                            <button class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modal-form"> <i
                                    class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic-pengumuman">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk MS
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk EN
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kandungan MS</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kandungan EN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Mula Papar </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Akhir Papar </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Kemaskini </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anoouces as $pengumuman)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->tajuk_bm }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->tajuk_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->kandungan_bm }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->kandungan_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->tarikh_mula }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->tarikh_akhir }}</td>
                                        <td class="text-sm font-weight-normal">{{ $pengumuman->updated_at }}</td>
                                        <td>
                                            @if ($pengumuman->status === 'aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-success">Aktif</span>
                                                </span>
                                            @elseif ($pengumuman->status === 'tidak_aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-form2-{{ $pengumuman->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-form2-{{ $pengumuman->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card card-plain">
                                                        <div class="card-header pb-0 text-left">
                                                            <h3 class="font-weight-bolder text-info text-gradient">Kemaskini
                                                            </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <form role="form text-left" method="POST"
                                                                action="/tetapan-pengumuman/{{ $pengumuman->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $pengumuman->id }}">
                                                                <div class="form-group">
                                                                    <label for="title">Tajuk MS</label>
                                                                    <input type="text" class="form-control" name="tajuk_bm"
                                                                        value="{{ $pengumuman->tajuk_bm }}"
                                                                        placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Tajuk EN</label>
                                                                    <input type="text" class="form-control" name="tajuk_en"
                                                                        value="{{ $pengumuman->tajuk_en }}"
                                                                        placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Kandungan MS</label>
                                                                    <textarea class="form-control" name="kandungan_bm"
                                                                        rows="2">{{ $pengumuman->kandungan_bm }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Kandungan EN</label>
                                                                    <textarea class="form-control" name="kandungan_en"
                                                                        rows="2">{{ $pengumuman->kandungan_en }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Status</label>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="aktif" @if ($pengumuman->status == 'aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="active">Aktif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="tidak_aktif" @if ($pengumuman->status == 'tidak_aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="notActive">Tidak Aktif</label>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="title">Tarikh Mula Papar</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tarikh_mula"
                                                                                value="{{ $pengumuman->tarikh_mula }}"
                                                                                placeholder="">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="title">Tarikh Akhir Papar</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tarikh_akhir"
                                                                                value="{{ $pengumuman->tarikh_akhir }}"
                                                                                placeholder="">
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="text-center d-flex justify-content-end">
                                                                    <button type="button"
                                                                        class="btn btn-round bg-gradient-danger text-capitalize"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="col-md-4">
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah</h3>
                                <!-- <p class="mb-0">Enter your email and password to sign in</p> -->
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="POST" action="/tetapan-pengumuman">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Tajuk MS</label>
                                        <input type="text" class="form-control" name="tajuk_bm" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Tajuk EN</label>
                                        <input type="text" class="form-control" name="tajuk_en" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Kandungan MS</label>
                                        <textarea class="form-control" name="kandungan_bm" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Kandungan EN</label>
                                        <textarea class="form-control" name="kandungan_en" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Status</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="aktif">
                                            <label class="form-check-label" for="active">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="tidak_aktif">
                                            <label class="form-check-label" for="notActive">Tidak Aktif</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="title">Tarikh Mula Papar</label>
                                                <input type="date" class="form-control" name="tarikh_mula"
                                                    aria-describedby="title" placeholder="">
                                            </div>
                                            <div class="col">
                                                <label for="title">Tarikh Akhir Papar</label>
                                                <input type="date" class="form-control" name="tarikh_akhir"
                                                    aria-describedby="title" placeholder="">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="text-center d-flex justify-content-end">
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
        const dataTableBasicPengumuman = new simpleDatatables.DataTable("#datatable-basic-pengumuman", {
            searchable: true,
            fixedHeight: true
        });
    </script>


@stop
