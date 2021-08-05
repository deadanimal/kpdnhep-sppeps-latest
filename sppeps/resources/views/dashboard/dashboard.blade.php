@extends('layouts.base-pemohon')

@section('content')

<div class="container-fluid py-4" style="background-image: url('/assets/img/background/kpdnhep-building.jpg'); background-attachment: fixed; background-size:cover; background-repeat: no-repeat;">
    <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Borang Profile</button>
    <a href="/kemaskini-profil">Kemaskini Profil</a> -->

    <div class="container-fluid d-flex justify-content-center" style="height:700px">
        <div id="portalcontent">
            <div class="row p-3" style="height:100%; margin-top: 100px;">

                <div class="col p-3 d-flex align-items-start" [style]="!flag_1 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-baru">
                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16" style="color: #272b4a;">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </div>
                            <div class="card-footer col d-flex align-items-end justify-content-center">
                                <p class="text-dark text-center" style="font-weight: 500;"><strong> PERMOHONAN BAHARU </strong></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col p-3 d-flex justify-content-center" [style]="!flag_3 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-pembaharuan">

                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-sync-alt fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong>PERMOHONAN PEMBAHARUAN</strong></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col p-3 d-flex justify-content-center" [style]="!flag_2 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-pendua">


                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="far fa-copy fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong> PERMOHONAN PENDUA</strong></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col p-3 d-flex justify-content-center" [style]="!flag_4 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-rayuan">
                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-pencil-alt fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong> PERMOHONAN RAYUAN</strong></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col p-3 d-flex justify-content-center">
                    <a class="nav-link text-white" href="/status-permohonan">
                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-search fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong> SEMAKAN STATUS PERMOHONAN</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button> -->
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Maklumat Profil</h3>
                            <!-- <p class="mb-0">Enter your email and password to sign in</p> -->
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <div class="form-group col-6">

                                    <label for="image">Gambar Profil</label>
                                    <br>
                                    <label class="btn bg-gradient-info form-control col-6 m-0">
                                        <i class="fa fa-image"></i> Pilih Gambar<input type="file" style="display: none;" name="image">
                                    </label>
                                    <!-- <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder=""> -->
                                </div>

                                <div class="form-group">
                                    <small class="text-xs mb-3">Pemohon perlu memasukkan gambar profil berukuran passport dalam format jpg. Gambar ini akan digunakan untuk dicetak atas kad permit.</small>
                                    <br>
                                    <div id="fileList" class="text-sm">Tiada Gambar Dipilih</div>

                                </div>
                                <div class="form-group">
                                    <label for="title">Nama</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Kad Pengenalan</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">Umur</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">E-mel</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">Tarikh Lahir</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Jantina</label>
                                    <!-- <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" > -->

                                    <select name="jantina" id="jantina" class="form-control form-control-sm">
                                        <option value="">Sila Pilih</option>
                                        <option value="">Lelaki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Alamat</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="Alamat 1">
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="Alamat 2">
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="Alamat 3">
                                </div>

                                <div class="form-group">
                                    <label for="title">Poskod</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder=" eg: 62623">
                                </div>

                                <div class="form-group">
                                    <label for="title">Negeri</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon bimbit</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="1234567890">
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon Rumah</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="1234567890">
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon Pejabat</label>
                                    <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="1234567890">
                                </div>
                                <div class="text-center d-flex justify-content-end">
                                    <button type="button" class="btn btn-round bg-gradient-danger text-capitalize" data-bs-dismiss="modal">Batal</button>
                                    <button type="Submit" class="btn btn-round bg-gradient-success text-capitalize">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop