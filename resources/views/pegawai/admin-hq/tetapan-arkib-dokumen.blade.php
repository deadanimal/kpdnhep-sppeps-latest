@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">
            <div>
                <h4>Arkib Dokumen</h4>
            </div>



            <div class="card card-frame">

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row d-flex flex-nowrap">
                        <div class="col">
                            <h5>Senarai Jenis Arkib Dokumen</h5>
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
                        <table class="table table-flush" id="datatable-basic-arkibdokumen">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama MS
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama EN
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paparan
                                        Gambar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Kemaskini</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arkibdokumens as $arkibdokumen)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm font-weight-normal">{{ $arkibdokumen->nama_ms }}</td>
                                        <td class="text-sm font-weight-normal">{{ $arkibdokumen->nama_en }}</td>
                                        <td class="text-sm font-weight-normal">
                                            <i class="fa fa-file-alt me-sm-1 text-dark"></i> <a
                                                href="/storage/{{ $arkibdokumen->jalan }}" target="_blank">{{ $arkibdokumen->jalan }}</a>
                                        </td>
                                        <td class="text-sm font-weight-normal">{{ $arkibdokumen->updated_at }}</td>
                                        <td>
                                            @if ($arkibdokumen->status === 'aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-success">Aktif</span>
                                                </span>
                                            @elseif ($arkibdokumen->status === 'tidak_aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a data-bs-toggle="modal"
                                                data-bs-target="#modal-form2-{{ $arkibdokumen->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="/tetapan-arkib-dokumen/{{ $arkibdokumen->id }}/delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            <a href="/tetapan-arkib-dokumen/{{ $arkibdokumen->id }}">
                                                <i class="far fa-list-alt"></i>
                                            </a>

                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-form2-{{ $arkibdokumen->id }}" tabindex="-1"
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
                                                                action="/tetapan-arkib-dokumen/{{ $arkibdokumen->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $arkibdokumen->id }}">
                                                                <div class="form-group">
                                                                    <label for="title">Nama (MS)</label>
                                                                    <input type="text" class="form-control" name="nama_ms"
                                                                        value="{{ $arkibdokumen->nama_ms }}"
                                                                        placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Nama (EN)</label>
                                                                    <input type="text" class="form-control" name="nama_en"
                                                                        value="{{ $arkibdokumen->nama_en }}"
                                                                        placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar Paparan</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input
                                                                            type="file" style="display: none;"
                                                                            id="arkibgambar-btn2" name="gambar">
                                                                    </label>
                                                                    <span id="arkibgambar-chosen2"
                                                                        class="mt-1">{{ $arkibdokumen->jalan }}</span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Status</label>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="aktif" @if ($arkibdokumen->status == 'aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="active">Aktif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="tidak_aktif" @if ($arkibdokumen->status == 'tidak_aktif') checked @endif>
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
                                <form role="form text-left" method="POST" action="/tetapan-arkib-dokumen"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Nama MS</label>
                                        <input type="text" class="form-control" name="nama_ms" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Nama EN</label>
                                        <input type="text" class="form-control" name="nama_en" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar Paparan</label>
                                        <br>
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Gambar <input type="file"
                                                    style="display: none;" class="form-control" id="arkibdokumen-btn1"
                                                    hidden name="gambar">
                                            </label>
                                            <span id="arkibdokumen-chosen1" class="mt-1">Tiada Gambar Dipilih</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Status</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="active"
                                                value="aktif">
                                            <label class="form-check-label" for="active">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="notActive"
                                                value="tidak_aktif">
                                            <label class="form-check-label" for="notActive">Tidak Aktif</label>
                                        </div>

                                    </div>
                                    <div class="text-center d-flex justify-content-end">
                                        <button type="button" class="btn btn-round bg-gradient-danger"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="Submit" class="btn btn-round bg-gradient-info">Hantar</button>
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
        const dataTableBasicArkibdokumen = new simpleDatatables.DataTable("#datatable-basic-arkibdokumen", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script>
        const arkibdokumenBtn1 = document.getElementById('arkibdokumen-btn1');

        const arkibdokumenChosen1 = document.getElementById('arkibdokumen-chosen1');

        arkibdokumenBtn1.addEventListener('change', function() {
            arkibdokumenChosen1.textContent = this.files[0].name
        })

        const arkibdokumenBtn2 = document.getElementById('arkibdokumen-btn2');

        const arkibdokumenChosen2 = document.getElementById('arkibdokumen-chosen2');

        arkibdokumenBtn2.addEventListener('change', function() {
            arkibdokumenChosen2.textContent = this.files[0].name
        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    
@stop
