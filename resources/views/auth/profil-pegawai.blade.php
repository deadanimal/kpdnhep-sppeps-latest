@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">
    <div class="pt-4">

        <div class="card card-frame">

            <div class="card-header" style="background-color: #f5e7f2;">
                <h6 class="text-uppercade ">Profil Pegawai</h6>
            </div>
            <div class="card-body">
                <form class="d-flex justify-content-center font-black" style="width: 100%;" (ngSubmit)="onSubmit(submit)">
                    <div class="d-flex justify-content-center flex-wrap" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                        <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">

                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">No Kad Pengenalan</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Nama Penuh</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Negeri</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Jawatan</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Gred</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Bahagian</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Seksyen</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">E-mel</label>
                                    <div class="col-5">
                                        <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                    <label for="action" class="col-sm-3  p-2">Capaian</label>
                                    <div class="col">

                                        <div class="row">
                                            <div class="col-1 p-2">
                                                1
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="action" aria-describedby="" placeholder="" value="" disabled>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-1 p-2">
                                                2
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="action" aria-describedby="" placeholder="" value="" disabled>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


</div>


@stop