@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">
            <div>
                <h4>Soalan Lazim (FAQ)</h4>
            </div>

            <div class="card card-frame mt-4">

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row d-flex flex-nowrap">
                        <div class="col">
                            <h5>Senarai Kategori</h5>
                        </div>

                        <div class="col">
                            <div class="col d-flex justify-content-end">
                                <button class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modal-form">
                                    <i class="fas fa-plus-circle"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    <table class="table table-flush" id="datatable-basic-kategori">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    Kategori BM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    Kategori BI</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategorifaqs as $kategorifaq)
                                <tr>
                                    <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm font-weight-normal">{{ $kategorifaq->nama_kategori_bm }}</td>
                                    <td class="text-sm font-weight-normal">{{ $kategorifaq->nama_kategori_en }}</td>
                                    <td class="text-sm font-weight-normal">
                                        @if ($kategorifaq->status === 'aktif')
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-success">Aktif</span>
                                            </span>
                                        @elseif ($kategorifaq->status === 'tidak_aktif')
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm font-weight-normal">
                                        <a data-bs-toggle="modal" data-bs-target="#modal-form2-{{ $kategorifaq->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#modaldeleteKategori-{{ $kategorifaq->id }}">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>

                                    <div class="modal fade" id="modaldeleteKategori-{{ $kategorifaq->id }}" tabindex="-1" role="dialog"
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
                                                    <a href="/tetapan-kategorifaq/{{ $kategorifaq->id }}/delete"
                                                        class="btn btn-success">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>

                                <div class="modal fade" id="modal-form2-{{ $kategorifaq->id }}" tabindex="-1"
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
                                                            action="/tetapan-faq/{{ $kategorifaq->id }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="jenis" value="category">
                                                            <input type="hidden" name="id" value="{{ $kategorifaq->id }}">
                                                            <div class="form-group">
                                                                <label for="title">Nama Kategori BM</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $kategorifaq->nama_kategori_bm }} "
                                                                    name="nama_kategori_bm">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title">Nama Kategori BI</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $kategorifaq->nama_kategori_en }}"
                                                                    name="nama_kategori_en">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="content">Status</label>
                                                                <br>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="aktif" @if ($kategorifaq->status == 'aktif') checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="active">Aktif</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="tidak_aktif" @if ($kategorifaq->status == 'tidak_aktif') checked @endif>
                                                                    <label class="form-check-label" for="notActive">Tidak
                                                                        Aktif</label>
                                                                </div>˝

                                                            </div>

                                                            <div class="text-center d-flex justify-content-end">
                                                                <button type="button"
                                                                    class="btn btn-round bg-gradient-danger text-capitalize"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="Submit"
                                                                    class="btn btn-round btn-success text-capitalize">Simpan</button>
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

            <div class="card card-frame mt-4">

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row d-flex flex-nowrap">
                        <div class="col">
                            <h5>Senarai FAQ</h5>
                        </div>

                    </div>

                    <div class="col">
                        <div class="col d-flex justify-content-end">
                            <button class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modal-form3"> <i
                                    class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic-senarai">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk
                                        BM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk
                                        BI</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kandungan BM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kandungan BI</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turutan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm font-weight-normal">{{ $faq->tajuk_bm }}</td>
                                        <td class="text-sm font-weight-normal">{{ $faq->tajuk_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $faq->kandungan_bm }}</td>
                                        <td class="text-sm font-weight-normal">{{ $faq->kandungan_en }}</td>
                                        <td class="text-sm font-weight-normal">{{ $faq->turutan }}</td>
                                        <td class="text-sm font-weight-normal">{{ $faq->nama_kategori_bm }}</td>
                                        <td class="text-sm font-weight-normal">
                                            @if ($faq->status === 'aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-success">Aktif</span>
                                                </span>
                                            @elseif ($faq->status === 'tidak_aktif')
                                                <span class="text-secondary text-sm font-weight-bold">
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-form4-{{ $faq->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#modaldeleteFaq-{{ $faq->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>

                                        <div class="modal fade" id="modaldeleteFaq-{{ $faq->id }}" tabindex="-1" role="dialog"
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
                                                        <a href="/tetapan-faq/{{ $faq->id }}/delete"
                                                            class="btn btn-success">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                    <div class="modal fade" id="modal-form4-{{ $faq->id }}" tabindex="-1"
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
                                                                action="/tetapan-faq/{{ $faq->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="jenis" value="senarai">
                                                                <input type="hidden" name="id" value="{{ $faq->id }}">
                                                                <div class="form-group">
                                                                    <label for="title">Tajuk BM</label>
                                                                    <input type="text" class="form-control" name="tajuk_bm"
                                                                        value="{{ $faq->tajuk_bm }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Tajuk BI</label>
                                                                    <input type="text" class="form-control" name="tajuk_en"
                                                                        value="{{ $faq->tajuk_en }}" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan BM</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_bm">{{ $faq->kandungan_bm }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Keterangan BI</label>
                                                                    <textarea class="form-control" rows="3"
                                                                        name="kandungan_en">{{ $faq->kandungan_en }}</textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Turutan</label>
                                                                    <select name="turutan" class="form-control">
                                                                        <option hidden selected>{{ $faq->turutan }}
                                                                        </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                        <option value="13">13</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>
                                                                        <option value="16">16</option>
                                                                        <option value="17">17</option>
                                                                        <option value="18">18</option>
                                                                        <option value="19">19</option>
                                                                        <option value="20">20</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22">22</option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title">Kategori</label>
                                                                    <select name="kategori_id" class="form-control">
                                                                        <option hidden selected value="{{ $faq->kategori_id }}">
                                                                            {{ $faq->nama_kategori_bm }}
                                                                        </option>
                                                                        @foreach ($kategorifaqs as $kategorifaq)
                                                                            <option value="{{ $kategorifaq->id }}">
                                                                                {{ $kategorifaq->nama_kategori_bm }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Status</label>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="aktif" @if ($faq->status == 'aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="active">Aktif</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="status" value="tidak_aktif" @if ($faq->status == 'tidak_aktif') checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="notActive">Tidak Aktif</label>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center d-flex justify-content-end">
                                                                    <button type="button"
                                                                        class="btn btn-round bg-gradient-danger text-capitalize"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="Submit"
                                                                        class="btn btn-round btn-success text-capitalize">Simpan</button>
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
                                <form role="form text-left" method="POST" action="/tetapan-faq">
                                    @csrf
                                    <input type="hidden" name="jenis" value="category">
                                    <div class="form-group">
                                        <label for="title">Nama Kategori BM</label>
                                        <input type="text" class="form-control" name="nama_kategori_bm" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Nama Kategori BI</label>
                                        <input type="text" class="form-control" name="nama_kategori_en" placeholder="">
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
                                        <button type="button" class="btn btn-round bg-gradient-danger text-capitalize"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="Submit"
                                            class="btn btn-round btn-success text-capitalize">Simpan</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah</h3>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="POST" action="/tetapan-faq">
                                    @csrf
                                    <input type="hidden" name="jenis" value="senarai">

                                    <div class="form-group">
                                        <label for="title">Tajuk BM</label>
                                        <input type="text" class="form-control" name="tajuk_bm" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Tajuk BI</label>
                                        <input type="text" class="form-control" name="tajuk_en" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan BM</label>
                                        <textarea class="form-control" rows="3" name="kandungan_bm"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Keterangan BI</label>
                                        <textarea class="form-control" rows="3" name="kandungan_en"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Turutan</label>
                                        <select name="turutan" class="form-control">
                                            <option hidden selected>Sila Pilih</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        {{-- <input type="hidden" name="kategori_id" value="{{ $kategorifaq->id }}"> --}}
                                        <label for="title">Kategori</label>
                                        <select name="kategori_id" class="form-control">
                                            <option hidden selected>Sila Pilih</option>
                                            @foreach ($kategorifaqs as $kategorifaq)
                                                <option value="{{ $kategorifaq->id }}">
                                                    {{ $kategorifaq->nama_kategori_bm }}</option>
                                            @endforeach
                                        </select>

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
                                        <button type="button" class="btn btn-round bg-gradient-danger text-capitalize"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="Submit"
                                            class="btn btn-round btn-success text-capitalize">Simpan</button>
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
        const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-basic-kategori", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script type="text/javascript">
        const dataTableBasicSenarai = new simpleDatatables.DataTable("#datatable-basic-senarai", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

@stop
