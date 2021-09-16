@extends('layouts.baseUser')

@section('content')



    <div id="container" class="container-fluid d-flex justify-content-center">
        <div class="card card-frame" style="width: 45%;">
            <div class="card-body">
                <div class="container mt-4">
                    <h3>{{ __('landing.kemaskini_profil') }}</h3>
                </div>

                <div class="card card-plain">
                    <div class="card-body">
                        <form role="form text-left" method="POST" action="/profil/{{ $pemohon->id }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            {{-- <input id="upload-Image" type="file" onchange="loadImageFile();" /> --}}

                            <img id="original-Img" style="display: none"/>

                            {{-- <img id="upload-Preview"/> --}}

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col d-flex justify-content-center">
                                        <label>
                                            <div class="position-relative">
                                                @if ($pemohon->gambar_profil === '/assets/img/icons/default_profile.png')
                                                    <img src="{{ $pemohon->gambar_profil }}" class="border-radius-md"
                                                        width="150" height="150" id="upload-Preview"/>
                                                @else
                                                    <img src="/storage/{{ $pemohon->gambar_profil }}"
                                                        class="border-radius-md" width="150" height="150" id="upload-Preview"/>
                                                @endif

                                                <a
                                                    class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                                    <i class="fa fa-pen top-0" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="" aria-hidden="true"
                                                        data-bs-original-title="Edit Image"
                                                        aria-label="Edit Image"></i><span class="sr-only">Edit
                                                        Image</span>
                                                </a>
                                            </div>
                                            <input id="upload-Image" type="file" onchange="loadImageFile();" name="gambar_profil" style="display: none">
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group" style="outline: 1px dashed red;">
                                        <small
                                            class="text-xs mb-3">{{ __('landing.pemohon_perlu_memasukan___') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.nama') }}</label>
                                <input type="text" class="form-control form-control-sm" name="name" placeholder=""
                                    value="{{ $pemohon->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.no_kp') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="no_kp"
                                    value="{{ $pemohon->no_kp }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.umur') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="umur"
                                    value="{{ $pemohon->umur }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.tarikh_lahir') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="tarikh_lahir"
                                    value="{{ $pemohon->tarikh_lahir }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.emel') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="email"
                                    value="{{ $pemohon->email }}" readonly>
                            </div>


                            <div class="form-group">
                                <label for="title">{{ __('landing.jantina') }}</label>
                                <!-- <input type="text" class="form-control"   placeholder="" > -->

                                <select name="jantina" id="jantina" class="form-control form-control-sm">
                                    <option value="">--{{ __('landing.sila_pilih') }}--</option>
                                    <option {{ $pemohon->jantina == 'Lelaki' ? 'selected' : '' }} value="Lelaki">
                                        {{ __('landing.lelaki') }}
                                    </option>
                                    <option {{ $pemohon->jantina == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                        {{ __('landing.perempuan') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.alamat') }}</label>
                                <input type="text" class="form-control form-control-sm" name="alamat1"
                                    value="{{ $pemohon->alamat1 }}" placeholder="Alamat baris 1">
                                <input type="text" class="form-control form-control-sm" name="alamat2"
                                    value="{{ $pemohon->alamat2 }}" placeholder="Alamat baris 2">
                                <input type="text" class="form-control form-control-sm" name="alamat3"
                                    value="{{ $pemohon->alamat3 }}" placeholder="Alamat baris 3">
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.poskod') }}</label>
                                <input type="text" class="form-control form-control-sm" name="poskod"
                                    value="{{ $pemohon->poskod }}" placeholder=" e.g 62623">
                            </div>

                            <div class="form-group">
                                <label>{{ __('landing.negeri') }}</label>
                                <select class="form-control form-control-sm" aria-label="Default select example"
                                    name="negeri">
                                    <option value="">--{{ __('landing.pilih_negeri') }}--</option>
                                    <option {{ $pemohon->negeri == 'Perlis' ? 'selected' : '' }} value="Perlis">Perlis
                                    </option>
                                    <option {{ $pemohon->negeri == 'Kedah' ? 'selected' : '' }} value="Kedah">Kedah
                                    </option>
                                    <option {{ $pemohon->negeri == 'Pulau Pinang' ? 'selected' : '' }}
                                        value="Pulau Pinang">Pulau Pinang</option>
                                    <option {{ $pemohon->negeri == 'Perak' ? 'selected' : '' }} value="Perak">Perak
                                    </option>
                                    <option {{ $pemohon->negeri == 'Selangor' ? 'selected' : '' }} value="Selangor">
                                        Selangor</option>
                                    <option {{ $pemohon->negeri == 'Melaka' ? 'selected' : '' }} value="Melaka">Melaka
                                    </option>
                                    <option {{ $pemohon->negeri == 'Negeri Sembilan' ? 'selected' : '' }}
                                        value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option {{ $pemohon->negeri == 'Johor' ? 'selected' : '' }} value="Johor">Johor
                                    </option>
                                    <option {{ $pemohon->negeri == 'Pahang' ? 'selected' : '' }} value="Pahang">Pahang
                                    </option>
                                    <option {{ $pemohon->negeri == 'Terengganu' ? 'selected' : '' }} value="Terengganu">
                                        Terengganu</option>
                                    <option {{ $pemohon->negeri == 'Kelantan' ? 'selected' : '' }} value="Kelantan">
                                        Kelantan</option>
                                    <option {{ $pemohon->negeri == 'Sabah' ? 'selected' : '' }} value="Sabah">Sabah
                                    </option>
                                    <option {{ $pemohon->negeri == 'Sarawak' ? 'selected' : '' }} value="Sarawak">
                                        Sarawak</option>
                                    <option {{ $pemohon->negeri == 'WP Kuala Lumpur' ? 'selected' : '' }}
                                        value="WP Kuala Lumpur">W. P. Kuala Lumpur
                                    </option>
                                    <option {{ $pemohon->negeri == 'WP Putrajaya' ? 'selected' : '' }}
                                        value="WP Putrajaya">W. P. Putrajaya</option>
                                    <option {{ $pemohon->negeri == 'WP Labuan' ? 'selected' : '' }} value="WP Labuan">
                                        W. P. Labuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.no_telefon_bimbit') }}</label>
                                <input type="text" class="form-control form-control-sm" name="no_telefon_bimbit"
                                    value="{{ $pemohon->no_telefon_bimbit }}" placeholder="e.g 1234567890">
                            </div>

                            <div class="form-group">
                                <label for="title"> {{ __('landing.no_telefon_rumah') }}</label>
                                <input type="text" class="form-control form-control-sm" name="no_telefon_rumah"
                                    value="{{ $pemohon->no_telefon_rumah }}" placeholder="e.g 1234567890">
                            </div>

                            <div class="form-group">
                                <label for="title"> {{ __('landing.no_telefon_pejabat') }}</label>
                                <input type="text" class="form-control form-control-sm" name="no_telefon_pejabat"
                                    value="{{ $pemohon->no_telefon_pejabat }}" placeholder="e.g 1234567890">
                            </div>
                            <div class="text-center d-flex justify-content-end">
                                @if ($pemohon->profil_update != 0)
                                    <a href="/profil" type="button" class="btn btn-round bg-gradient-danger text-capitalize"
                                        data-bs-dismiss="modal">{{ __('landing.batal') }}</a>
                                @endif

                                <button type="Submit"
                                    class="btn btn-round bg-gradient-success text-capitalize">{{ __('landing.simpan') }}</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

    {{-- <script>
        $("input").change(function(e) {

            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                var file = e.originalEvent.srcElement.files[i];

                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $("#gambar").after(img);
            }
        });
    </script> --}}

    <script type="text/javascript">
        var fileReader = new FileReader();
        var filterType =
            /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

        fileReader.onload = function(event) {
            var image = new Image();

            image.onload = function() {
                document.getElementById("original-Img").src = image.src;
                var canvas = document.createElement("canvas");
                var context = canvas.getContext("2d");
                // canvas.width = image.width / 4;
                // canvas.height = image.height / 4;
                canvas.width = 150;
                canvas.height = 150;
                context.drawImage(image,
                    0,
                    0,
                    image.width,
                    image.height,
                    0,
                    0,
                    canvas.width,
                    canvas.height
                );

                document.getElementById("upload-Preview").src = canvas.toDataURL();
            }
            image.src = event.target.result;
        };

        var loadImageFile = function() {
            var uploadImage = document.getElementById("upload-Image");

            //check and retuns the length of uploded file.
            if (uploadImage.files.length === 0) {
                return;
            }

            //Is Used for validate a valid file.
            var uploadFile = document.getElementById("upload-Image").files[0];
            if (!filterType.test(uploadFile.type)) {
                alert("Please select a valid image.");
                return;
            }

            fileReader.readAsDataURL(uploadFile);
        }
    </script>

@stop
