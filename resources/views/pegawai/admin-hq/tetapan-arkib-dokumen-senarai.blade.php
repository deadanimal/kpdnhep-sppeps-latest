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
                            <h5>Senarai Arkib Dokumen</h5>
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
                        <table class="table table-flush" id="datatable-basic-senaraiarkibdokumen">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk
                                        Dokumen MS</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk
                                        Dokumen EN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Keterangan Dokumen MS</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Keterangan Dokumen EN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Kemaskini</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($senaraidokumens as $dokumeq)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm font-weight-normal">{{ $dokumeq->tajuk_ms }}</td>
                                        <td class="text-sm font-weight-normal">{{ $dokumeq->tajuk_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $dokumeq->kandungan_ms }}</td>
                                        <td class="text-sm font-weight-normal">{{ $dokumeq->kandungan_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $dokumeq->updated_at }}</td>
                                        <td>
                                            @if ($dokumeq->status === 'aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-success">Aktif</span>
                                                </span>
                                            @elseif ($dokumeq->status === 'tidak_aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-form2-{{ $dokumeq->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#modaldelete-{{ $dokumeq->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            </a>
                                        </td>

                                        <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog"
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
                                                        <a href="/tetapan-arkib-dokumen-senarai/{{ $dokumeq->id }}/delete"
                                                            class="btn btn-success">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                    <div class="modal fade" id="modal-form2-{{ $dokumeq->id }}" tabindex="-1"
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
                                                                action="/tetapan-arkib-dokumen/{{ $dokumeq->id }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $dokumeq->id }}">
                                                                <div class="form-group">
                                                                    <label for="title">Nama (MS)</label>
                                                                    <input type="text" class="form-control" name="tajuk_ms"
                                                                        value="{{ $dokumeq->tajuk_ms }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Nama (EN)</label>
                                                                    <input type="text" class="form-control" name="tajuk_en"
                                                                        value="{{ $dokumeq->tajuk_en }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan MS</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_ms">{{ $dokumeq->kandungan_ms }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan EN</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_en">{{ $dokumeq->kandungan_en }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Dokumen</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Dokumen<input
                                                                            type="file" style="display: none;"
                                                                            id="senaraiarkibdokumen-btn2" name="gambar">
                                                                    </label>
                                                                    <span id="senaraiarkibdokumen-chosen2"
                                                                        class="mt-1">{{ $dokumeq->jalan1 }}</span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Status</label>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="aktif" @if ($dokumeq->status == 'aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="active">Aktif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="tidak_aktif" @if ($dokumeq->status == 'tidak_aktif') checked @endif>
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
                                <form role="form text-left" method="POST" action="/tetapan-arkib-dokumen-senarai"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id_arkibdokumen" value="{{ $arkibdokumenid }}">
                                    <div class="form-group">
                                        <label for="title">Tajuk Dokumen MS</label>
                                        <input type="text" class="form-control form-control-sm" name="tajuk_ms"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Tajuk Dokumen EN</label>
                                        <input type="text" class="form-control form-control-sm" name="tajuk_en"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan Dokumen MS</label>
                                        <textarea class="form-control" rows="3" name="kandungan_ms"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan Dokumen EN</label>
                                        <textarea class="form-control" rows="3" name="kandungan_en"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Dokumen 1</label>
                                        <br>
                                        <div class="col">
                                            <label class="btn bg-gradient-info form-control col-6">
                                                <i class="fa fa-image"></i> Pilih Dokumen <input type="file"
                                                    style="display: none;" class="form-control"
                                                    id="senaraiarkibdokumen-btn1" hidden name="gambar">
                                            </label>
                                            <span id="senaraiarkibdokumen-chosen1" class="mt-1">Tiada Dokumen Dipilih</span>
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
        const dataTableBasicSenaraidokumen = new simpleDatatables.DataTable("#datatable-basic-senaraiarkibdokumen", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script src="/assets/js/plugins/flatpickr.min.js"></script>
    <script>
        const senaraiarkibdokumenBtn1 = document.getElementById('senaraiarkibdokumen-btn1');

        const senaraiarkibdokumenChosen1 = document.getElementById('senaraiarkibdokumen-chosen1');

        senaraiarkibdokumenBtn1.addEventListener('change', function() {
            senaraiarkibdokumenChosen1.textContent = this.files[0].name
        })

        const senaraiarkibdokumenBtn2 = document.getElementById('senaraiarkibdokumen-btn2');

        const senaraiarkibdokumenChosen2 = document.getElementById('senaraiarkibdokumen-chosen2');

        senaraiarkibdokumenBtn2.addEventListener('change', function() {
            senaraiarkibdokumenChosen2.textContent = this.files[0].name
        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

@stop
