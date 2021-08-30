@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="pt-4">

            <div class="card card-frame">
                

                <div class="card-header" style="background-color: #f5e7f2;">
                    <h6 class="text-uppercade ">Profil Pegawai</h6>
                </div>
                <div class="card-body">
                    <form class="d-flex justify-content-center font-black" style="width: 100%;"
                        (ngSubmit)="onSubmit(submit)">
                        <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                            fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                            <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">

                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">No Kad Pengenalan</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action"
                                                value="{{ $user->no_kp }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Nama Penuh</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action"
                                                value="{{ $user->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Negeri</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action"
                                                value="{{ $user->negeri }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Jawatan</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action"
                                                value="{{ $user->jawatan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Gred</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Bahagian</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Seksyen</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">E-mel</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control col-9" id="action"
                                                value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                        <label for="action" class="col-sm-3  p-2">Capaian</label>
                                        <div class="col">
                                            @foreach ($user->roles as $role)

                                                @if ($role->name === 'pemproses_negeri')
                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="Pemproses Negeri" disabled>
                                                        </div>
                                                    </div>

                                                @elseif ($role->name === "penyokong_negeri")
                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="Penyokong Negeri" disabled>
                                                        </div>
                                                    </div>

                                                @elseif ($role->name === "pelulus_negeri")

                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="Pelulus Negeri" disabled>
                                                        </div>
                                                    </div>

                                                @elseif ($role->name === "pemproses_hq")
                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="Pemproses HQ" disabled>
                                                        </div>
                                                    </div>

                                                @elseif ($role->name === "penyokong_hq")

                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="Penyokong HQ" disabled>
                                                        </div>
                                                    </div>

                                                @elseif ($role->name === "pelulus_hq")
                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="Pelulus HQ" disabled>
                                                        </div>
                                                    </div>

                                                @else

                                                    <div class="row">
                                                        <div class="col-1 p-2">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" id="action"
                                                                value="{{ $role->name }}" disabled>
                                                        </div>
                                                    </div>

                                                @endif
                                                <br>
                                            @endforeach
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
