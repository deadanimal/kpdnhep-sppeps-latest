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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk BM
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk BI
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
                                            <a data-bs-toggle="modal" data-bs-target="#modaldelete-{{ $gambaq->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>

                                        <div class="modal fade" id="modaldelete-{{ $gambaq->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                        <br>
                                                        Anda pasti mahu hapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <a href="/tetapan-arkib-bergambar-senarai/{{ $gambaq->id }}/delete"
                                                            class="btn btn-success">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                                action="/tetapan-arkib-bergambar-senarai/{{ $gambaq->id }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id" value="{{ $gambaq->id }}">
                                                                <input type="hidden" name="id_arkibgambar" value="{{ $gambaq->id_arkibgambar }}">
                                                                <div class="form-group">
                                                                    <label for="title">Nama BM</label>
                                                                    <input type="text" class="form-control" name="tajuk_ms"
                                                                        value="{{ $gambaq->tajuk_ms }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Nama BI</label>
                                                                    <input type="text" class="form-control" name="tajuk_en"
                                                                        value="{{ $gambaq->tajuk_en }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan BM</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_ms">{{ $gambaq->kandungan_ms }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan BI</label>
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
                                                                    <label for="image">Gambar 1</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            id="senaraiarkibgambar-btn6" name="gambar1">
                                                                    </label>
                                                                    <span id="senaraiarkibgambar-chosen6" class="mt-1"><a
                                                                            href="/storage/{{ $gambaq->jalan1 }}"
                                                                            target="_blank">{{ $gambaq->jalan1 }}</a></span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar 2</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            id="senaraiarkibgambar-btn7" name="gambar2">
                                                                    </label>
                                                                    <span id="senaraiarkibgambar-chosen7" class="mt-1"><a
                                                                            href="/storage/{{ $gambaq->jalan2 }}"
                                                                            target="_blank">{{ $gambaq->jalan2 }}</a></span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar 3</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            id="senaraiarkibgambar-btn8" name="gambar3">
                                                                    </label>
                                                                    <span id="senaraiarkibgambar-chosen8" class="mt-1"><a
                                                                            href="/storage/{{ $gambaq->jalan3 }}"
                                                                            target="_blank">{{ $gambaq->jalan3 }}</a></span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar 4</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            id="senaraiarkibgambar-btn9" name="gambar4">
                                                                    </label>
                                                                    <span id="senaraiarkibgambar-chosen9" class="mt-1"><a
                                                                            href="/storage/{{ $gambaq->jalan4 }}"
                                                                            target="_blank">{{ $gambaq->jalan4 }}</a></span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar 5</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            id="senaraiarkibgambar-btn10" name="gambar5">
                                                                    </label>
                                                                    <span id="senaraiarkibgambar-chosen10" class="mt-1"><a
                                                                            href="/storage/{{ $gambaq->jalan5 }}"
                                                                            target="_blank">{{ $gambaq->jalan5 }}</a></span>
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
                                        <label for="title">Tajuk BM</label>
                                        <input type="text" class="form-control form-control-sm" name="tajuk_ms"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Tajuk BI</label>
                                        <input type="text" class="form-control form-control-sm" name="tajuk_en"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan BM</label>
                                        <textarea class="form-control" rows="3" name="kandungan_ms"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan BM</label>
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
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                    style="display: none;" class="form-control" id="senaraiarkibgambar-btn1"
                                                    hidden name="gambar1">
                                            </label>
                                            <span id="senaraiarkibgambar-chosen1" class="mt-1">Tiada Gambar Dipilih</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 2</label>
                                        <br>
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                    style="display: none;" class="form-control" id="senaraiarkibgambar-btn2"
                                                    hidden name="gambar2">
                                            </label>
                                            <span id="senaraiarkibgambar-chosen2" class="mt-1">Tiada Gambar Dipilih</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 3</label>
                                        <br>
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                    style="display: none;" class="form-control" id="senaraiarkibgambar-btn3"
                                                    hidden name="gambar3">
                                            </label>
                                            <span id="senaraiarkibgambar-chosen3" class="mt-1">Tiada Gambar Dipilih</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 4</label>
                                        <br>
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                    style="display: none;" class="form-control" id="senaraiarkibgambar-btn4"
                                                    hidden name="gambar4">
                                            </label>
                                            <span id="senaraiarkibgambar-chosen4" class="mt-1">Tiada Gambar Dipilih</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar 5</label>
                                        <br>
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                    style="display: none;" class="form-control" id="senaraiarkibgambar-btn5"
                                                    hidden name="gambar5">
                                            </label>
                                            <span id="senaraiarkibgambar-chosen5" class="mt-1">Tiada Gambar Dipilih</span>
                                        </div>
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
    <script>
        const senaraiarkibgambarBtn1 = document.getElementById('senaraiarkibgambar-btn1');

        const senaraiarkibgambarChosen1 = document.getElementById('senaraiarkibgambar-chosen1');

        senaraiarkibgambarBtn1.addEventListener('change', function() {
            senaraiarkibgambarChosen1.textContent = this.files[0].name
        })

        const senaraiarkibgambarBtn2 = document.getElementById('senaraiarkibgambar-btn2');

        const senaraiarkibgambarChosen2 = document.getElementById('senaraiarkibgambar-chosen2');

        senaraiarkibgambarBtn2.addEventListener('change', function() {
            senaraiarkibgambarChosen2.textContent = this.files[0].name
        })
        const senaraiarkibgambarBtn3 = document.getElementById('senaraiarkibgambar-btn3');

        const senaraiarkibgambarChosen3 = document.getElementById('senaraiarkibgambar-chosen3');

        senaraiarkibgambarBtn3.addEventListener('change', function() {
            senaraiarkibgambarChosen3.textContent = this.files[0].name
        })

        const senaraiarkibgambarBtn4 = document.getElementById('senaraiarkibgambar-btn4');

        const senaraiarkibgambarChosen4 = document.getElementById('senaraiarkibgambar-chosen4');

        senaraiarkibgambarBtn4.addEventListener('change', function() {
            senaraiarkibgambarChosen4.textContent = this.files[0].name
        })
        const senaraiarkibgambarBtn5 = document.getElementById('senaraiarkibgambar-btn5');

        const senaraiarkibgambarChosen5 = document.getElementById('senaraiarkibgambar-chosen5');

        senaraiarkibgambarBtn5.addEventListener('change', function() {
            senaraiarkibgambarChosen5.textContent = this.files[0].name
        })

        const senaraiarkibgambarBtn6 = document.getElementById('senaraiarkibgambar-btn6');

        const senaraiarkibgambarChosen6 = document.getElementById('senaraiarkibgambar-chosen6');

        senaraiarkibgambarBtn6.addEventListener('change', function() {
            senaraiarkibgambarChosen6.textContent = this.files[0].name
        })

        const senaraiarkibgambarBtn7 = document.getElementById('senaraiarkibgambar-btn7');

        const senaraiarkibgambarChosen7 = document.getElementById('senaraiarkibgambar-chosen7');

        senaraiarkibgambarBtn7.addEventListener('change', function() {
            senaraiarkibgambarChosen7.textContent = this.files[0].name
        })
        const senaraiarkibgambarBtn8 = document.getElementById('senaraiarkibgambar-btn8');

        const senaraiarkibgambarChosen8 = document.getElementById('senaraiarkibgambar-chosen8');

        senaraiarkibgambarBtn8.addEventListener('change', function() {
            senaraiarkibgambarChosen8.textContent = this.files[0].name
        })

        const senaraiarkibgambarBtn9 = document.getElementById('senaraiarkibgambar-btn9');

        const senaraiarkibgambarChosen9 = document.getElementById('senaraiarkibgambar-chosen9');

        senaraiarkibgambarBtn9.addEventListener('change', function() {
            senaraiarkibgambarChosen9.textContent = this.files[0].name
        })
        const senaraiarkibgambarBtn10 = document.getElementById('senaraiarkibgambar-btn10');

        const senaraiarkibgambarChosen10 = document.getElementById('senaraiarkibgambar-chosen10');

        senaraiarkibgambarBtn10.addEventListener('change', function() {
            senaraiarkibgambarChosen10.textContent = this.files[0].name
        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

@stop
