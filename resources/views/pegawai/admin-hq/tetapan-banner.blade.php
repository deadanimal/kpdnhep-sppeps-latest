@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">
            <div>
                <h4>Banner</h4>
            </div>



            <div class="card card-frame">

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row d-flex flex-nowrap">
                        <div class="col">
                            <h5>Senarai Banner</h5>
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
                        <table class="table table-flush" id="datatable-basic-banner">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar
                                        Banner</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh
                                        Kemaskini </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm font-weight-normal">{{ $banner->tajuk }}</td>
                                        <td class="text-sm font-weight-normal">{{ $banner->keterangan }}</td>
                                        <td class="text-sm font-weight-normal">
                                            <i class="fa fa-user me-sm-1 text-dark"></i> <a href="/storage/{{ $banner->jalan }}" target="_blank">Gambar</a>
                                        </td>
                                        <td class="text-sm font-weight-normal">{{ $banner->updated_at }}</td>
                                        <td>
                                            @if ($banner->status === 'aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-success">Aktif</span>
                                                </span>
                                            @elseif ($banner->status === 'tidak_aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-form2-{{ $banner->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="/tetapan-banner/{{ $banner->id  }}/delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-form2-{{ $banner->id }}" tabindex="-1" role="dialog"
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
                                                                action="/tetapan-banner/{{ $banner->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id" value="{{ $banner->id }}">
                                                                <div class="form-group">
                                                                    <label for="title">Tajuk</label>
                                                                    <input type="text" class="form-control" name="tajuk"
                                                                        value="{{ $banner->tajuk }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="keterangan"
                                                                        value="{{ $banner->keterangan }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Gambar Banner</label>
                                                                    <br>
                                                                    <label class="btn bg-gradient-info form-control col-6">
                                                                        <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                                            style="display: none;" name="image">
                                                                    </label>
                            
                                                                    <div id="fileList">Tiada Gambar Dipilih</div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Status</label>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="aktif" @if ($banner->status == 'aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="active">Aktif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="tidak_aktif" @if ($banner->status == 'tidak_aktif') checked @endif>
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
                                <form role="form text-left" method="POST" action="/tetapan-banner" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Tajuk</label>
                                        <input type="text" class="form-control" placeholder="" name="tajuk">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="2"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="image">Gambar Banner</label>
                                        <br>
                                        {{-- <button class="form-control bg-gradient-info" name="gambar" type="file"><i class="fa fa-image"></i> Pilih Gambar</button> --}}
                                        <label class="btn bg-gradient-info form-control col-6">
                                            <i class="fa fa-image"></i> Pilih Gambar<input type="file"
                                                style="display: none;" class="form-control" name="gambar">
                                        </label>

                                    </div>

                                    <div class="form-group">
                                        <label for="content">Status</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                            value="aktif">
                                            <label class="form-check-label">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                            value="tidak_aktif">
                                            <label class="form-check-label">Tidak Aktif</label>
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
        const dataTableBasicBanner = new simpleDatatables.DataTable("#datatable-basic-banner", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
