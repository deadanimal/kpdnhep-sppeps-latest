@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">
            <div>
                <h4>Arkib Bergambar</h4>
            </div>

            <div class="card card-frame">

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row d-flex flex-nowrap">
                        <div class="col">
                            <h5>Senarai Arkib Bergambar</h5>
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
                        <table class="table table-flush" id="datatable-basic-senaraiarkib">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk MS
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk EN
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Keterangan MS</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Keterangan EN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Kemaskini</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($senaraigambars as $gambaq)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm font-weight-normal">{{ $gambaq->tajuk_ms }}</td>
                                        <td class="text-sm font-weight-normal">{{ $gambaq->tajuk_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $gambaq->kandungan_ms }}</td>
                                        <td class="text-sm font-weight-normal">{{ $gambaq->kandungan_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $gambaq->updated_at }}</td>
                                        <td>
                                            @if ($gambaq->status === 'aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-success">Aktif</span>
                                                </span>
                                            @elseif ($gambaq->status === 'tidak_aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-form2-{{ $gambaq->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="/tetapan-arkib-bergambar-senarai/{{ $gambaq->id }}/delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-form2-{{ $gambaq->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-form" aria-hidden="true">
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
                                                                action="/tetapan-arkib-bergambar/{{ $gambaq->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id" value="{{ $gambaq->id }}">
                                                                <div class="form-group">
                                                                    <label for="title">Nama (MS)</label>
                                                                    <input type="text" class="form-control" name="nama_ms"
                                                                        value="{{ $gambaq->tajuk_ms }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Nama (EN)</label>
                                                                    <input type="text" class="form-control" name="nama_en"
                                                                        value="{{ $gambaq->tajuk_en }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan MS</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_ms">{{ $gambaq->kandungan_ms }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan EN</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_en">{{ $gambaq->kandungan_en }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Lokasi</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                        name="lokasi" value="{{ $gambaq->lokasi }}">
                                                                </div>

                                                                <div class="form-group">

                                                                    <label for="title">Tarikh Program</label>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="title">Tarikh Mula</label>
                                                                            <input type="date"
                                                                                class="form-control form-control-sm"
                                                                                name="tarikh_mula"
                                                                                value="{{ $gambaq->tarikh_mula }}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="title">Tarikh Akhir</label>
                                                                            <input type="date"
                                                                                class="form-control form-control-sm"
                                                                                name="tarikh_akhir"
                                                                                value="{{ $gambaq->tarikh_akhir }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            name="gambar1">
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            name="gambar">
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            name="gambar">
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            name="gambar">
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            name="gambar">
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Status</label>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="aktif" @if ($gambaq->status == 'aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="active">Aktif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="tidak_aktif" @if ($gambaq->status == 'tidak_aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="notActive">Tidak Aktif</label>
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
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="POST" action="/tetapan-arkib-bergambar-senarai"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id_arkibgambar" value="{{ $arkibgambarid }}">
                                    <div class="form-group">
                                        <label for="title">Tajuk MS</label>
                                        <input type="text" class="form-control form-control-sm" name="tajuk_ms"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Tajuk EN</label>
                                        <input type="text" class="form-control form-control-sm" name="tajuk_en"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan MS</label>
                                        <textarea class="form-control" rows="3" name="kandungan_ms"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan EN</label>
                                        <textarea class="form-control" rows="3" name="kandungan_en"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Lokasi</label>
                                        <input type="text" class="form-control form-control-sm" name="lokasi"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">

                                        <label for="title">Tarikh Program</label>
                                        <div class="row">
                                            <div class="col">
                                                <label for="title">Tarikh Mula</label>
                                                <input type="date" class="form-control form-control-sm" name="tarikh_mula"
                                                    placeholder="">
                                            </div>
                                            <div class="col">
                                                <label for="title">Tarikh Akhir</label>
                                                <input type="date" class="form-control form-control-sm" name="tarikh_akhir"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 1</label>
                                        <br>
                                        <label class="btn bg-gradient-info form-control col-6">
                                            <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                style="display: none;" name="gambar1">
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 2</label>
                                        <br>
                                        <label class="btn bg-gradient-info form-control col-6">
                                            <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                style="display: none;" name="gambar2">
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 3</label>
                                        <br>
                                        <label class="btn bg-gradient-info form-control col-6">
                                            <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                style="display: none;" name="gambar3">
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 4</label>
                                        <br>
                                        <label class="btn bg-gradient-info form-control col-6">
                                            <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                style="display: none;" name="gambar4">
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 5</label>
                                        <br>
                                        <label class="btn bg-gradient-info form-control col-6">
                                            <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                style="display: none;" name="gambar5">
                                        </label>
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
                                    <div class="text-center d-flex justify-content-end">
                                        <button type="button" class="btn btn-round bg-gradient-danger"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="Submit" class="btn btn-round bg-gradient-success">Simpan</button>
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
        const dataTableBasicSenaraigambar = new simpleDatatables.DataTable("#datatable-basic-senaraiarkib", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script src="/assets/js/plugins/flatpickr.min.js"></script>
@stop
