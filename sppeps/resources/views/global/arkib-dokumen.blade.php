@extends('layouts.baseUser')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="p-2 text-capitalize">
            <h5 class="h3 text-dark pt-4 text-center"><strong>Arkib Dokumen</strong></h5>
        </div>
    </div>
    <div class="row d-flex justify-content-center pt-4">


        <div class="card col-3 move-on-hover m-1">

            <div class="card-body p-3">
                <div class="row">
                    <div class="col-2">
                        <i class="ni ni-air-baloon ni-2x"></i>
                    </div>
                    <div class="col">
                        <a href="/arkib-dokumen-senarai" class="card-title h5 d-block text-darker">
                            Arkib Dokumen 1
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="card col-3 move-on-hover m-1">

            <div class="card-body p-3">
                <div class="row">
                    <div class="col-2">
                        <i class="ni ni-archive-2 ni-2x"></i>
                    </div>
                    <div class="col">
                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                            Arkib Dokumen 2
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="card col-3 move-on-hover m-1">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-2">
                        <i class="ni ni-align-left-2 ni-2x"></i>
                    </div>
                    <div class="col">
                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                            Arkib Dokumen 3
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

</div>
@stop