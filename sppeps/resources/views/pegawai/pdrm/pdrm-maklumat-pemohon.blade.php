@extends('layouts.base-pdrm')

@section('content')

<div class="container-fluid py-4">

    <div class="p-3">

        <div>
            <h5>Semakan Rekod Jenayah</h5>
        </div>

        <div class="pt-4">

            <div class="card card-frame">
                <div class="card-header" style="background-color: #f5e7f2;">
                    <h6 class="text-uppercade ">Maklumat Permohonan</h6>
                </div>


                <div class="card-body">
                    <form class="d-flex justify-content-center" style="width: 100%;">
                        <div class="d-flex justify-content-center flex-wrap" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                            <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">

                                <div class="row form-group p-3 d-flex justify-content-center">

                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" alt="..." class="avatar avatar-xxl">
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="name">
                                            <strong>Nama</strong>
                                        </label>
                                        <div class="d-flex flex-nowrap align-items-center">
                                            <input type="text" class="form-control col-9" id="name" aria-describedby="name" placeholder="ali" [value]="info.nama" disabled>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="ic"><strong> No. Kad Pengenalan</strong></label>
                                        <input type="text" class="form-control" id="ic" aria-describedby="ic" placeholder="950323-08-5626" [value]="info.no_kp" disabled>
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="age"><strong> Umur</strong></label>
                                        <input type="text" class="form-control col-9" id="age" aria-describedby="age" placeholder="" value="25 Tahun" disabled>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="gender"><strong> Jantina</strong></label>
                                        <input type="text" class="form-control" id="age" aria-describedby="age" placeholder="" value="Perempuan" value="info.jantina" disabled>
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">

                                        <label for="address"><strong> Alamat</strong></label>
                                        <input type="text" class="col-9 form-control" id="address1" aria-describedby="address" placeholder="" [value]="info.alamat" disabled>
                                        <input type="text" class="col-9 form-control" id="address2" aria-describedby="address" placeholder="" [value]="info.alamat2" disabled>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="email"><strong> E-mel</strong></label>
                                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="" [value]="info.emel" disabled>
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="state"><strong>Negeri</strong></label>
                                        <input type="text" class="form-control col-9" id="state" aria-describedby="state" placeholder="" value="info.negeri" disabled>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="phoneNumber"><strong>No. Telefon</strong></label>
                                        <input type="text" class="form-control" id="phoneNumber" aria-describedby="phoneNumber" placeholder="" value="01234567890" [value]="info.notelbimbit" disabled>
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="licence"><strong>Lesen Memandu yang Sah</strong></label>
                                        <input type="text" class="form-control col-9" id="licence" aria-describedby="licence" placeholder="" value="info.lesen_sah" disabled>
                                    </div>
                                    <div class="col-1"></div>

                                    <div class="col form-group pr-0">
                                        <span><strong>Lampiran Dokumen</strong></span>

                                        <ol>
                                            <div class="row p-2">
                                                <div class="col">
                                                    <li>Salinan Lesen Memandu</li>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-sm text-white" style="background-color: #1d1da1;">Lihat
                                                        Lampiran</button>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col">
                                                    <li>Salinan Kad Pengenalan</li>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-sm text-white" style="background-color: #1d1da1;">Lihat
                                                        Lampiran</button>
                                                </div>
                                            </div>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="p-3 d-flex justify-content-center">
                                <input type="button" class="btn text-uppercase" style="background-color: #1d1da1; border-radius:25px" value="Semak" (click)="toggle()">
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="formContent" class="pt-4">


            <div class="card card-frame">

                <div class="card-header" style="background-color: #f5e7f2;">
                    <h6 class="text-uppercade ">Pengesahan Tapisan Rekod Jenayah</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf


                        <div class="p-3">

                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-2">Tindakan</label>
                                    <div class="col-sm-5">
                                        <select id="action" class="form-control" name="tindakan" [(ngModel)]="this.tindakan">
                                            <option selected>Sila Pilih</option>
                                            <option value="Tiada Rekod Jenayah">Tiada Rekod Jenayah</option>
                                            <option value="Ada Rekod Jenayah">Ada Rekod Jenayah</option>
                                            <option value="Dalam Proses">Dalam Proses</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="comment" class="col-sm-2 ">Catatan</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="catatan" name="catatan" [(ngModel)]="this.catatan"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 d-flex justify-content-center">
                                <input type="button" class="btn btn-danger text-uppercase m-1" value="BATAL">

                                <button type="submit" class="btn btn-success text-uppercase m-1" value="HANTAR">HANTAR</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@stop