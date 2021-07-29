@extends('layouts.baseUser')

@section('content')



<div id="container" class="container-fluid d-flex justify-content-center">
    <div class="card card-frame" style="width: 45%;">
        <div class="card-body">
            <div class="container mt-4">
                <h3>Kemaskini Profil</h3>
            </div>

            <div class="card card-plain">
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
                            <label for="title">Tarikh Lahir</label>
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="title">E-mel</label>
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="" disabled>
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
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="Alamat baris 1">
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="Alamat baris 2">
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="Alamat baris 3">
                        </div>

                        <div class="form-group">
                            <label for="title">Poskod</label>
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder=" e.g 62623">
                        </div>

                        <div class="form-group">
                            <label>Negeri</label>
                            <select class="form-control form-control-sm" aria-label="Default select example" name="negeri">
                                <option selected>--Pilih Negeri--</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Pulau Pinang">Pulau Pinang</option>
                                <option value="Perak">Perak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                <option value="WP Putrajaya">W. P. Putrajaya</option>
                                <option value="WP Labuan">W. P. Labuan</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Johor">Johor</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">No. Telefon Bimbit</label>
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="e.g 1234567890">
                        </div>

                        <div class="form-group">
                            <label for="title">No. Telefon Rumah</label>
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="e.g 1234567890">
                        </div>

                        <div class="form-group">
                            <label for="title">No. Telefon Pejabat</label>
                            <input type="text" class="form-control form-control-sm" id="title" aria-describedby="title" placeholder="e.g 1234567890">
                        </div>
                        <div class="text-center d-flex justify-content-end">
                            <button type="button" class="btn btn-round bg-gradient-danger text-capitalize" data-bs-dismiss="modal">Batal</button>
                            <button type="Submit" class="btn btn-round bg-gradient-success text-capitalize">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>


        <!-- <div class="card-body">
            <div class="container mt-4">
                <h3>Daftar Akaun 2</h3>
            </div>

            <form method="POST" action="">
                @csrf


                <div class="container mt-4">

                <div class="form-group mt-3">
                        <label for="nric">Nama</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">No. Kad Penganalan</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">Umur</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">Tarikh Lahir</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mel</label>
                        <input type="email" class="form-control" id="email" placeholder="abc123@gmail.com" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">Jantina</label>
                        <input type="text" class="form-control" name="nric" placeholder="">
                    </div>
                   
                    <div class="form-group mt-3">
                        <div class="input-group mb-4">
                            <input type="submit" class="btn bg-gradient-info btn-lg w-100">
                        </div>
                    </div>

                </div>
            </form>

        </div> -->
    </div>

</div>




@stop