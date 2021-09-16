
@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid mb-3">

        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>{{ __('landing.semakan_status_eps') }}</strong></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            <div class="card card-frame col-md-8 col-xs-3" >
                <div class="card-body">
                    <div class="container p-2 m-0 d-flex justify-content-center flex-wrap" style=" width: 100%;">
                        <div class="row p-2 m-0" style="width: 100%; justify-content:center">
                            <form method="POST" action="/cari-eps" class="p-2" style="width: 70%;">
                                @csrf
                                <div class="form-group text-capitalize d-flex justify-content-center flex-wrap">
                                    <label class="pb-3 pt-3" for="nric"><strong>{{ __('landing.no_kp') }}</strong>
                                    </label>
                                    <input type="text" class="form-control text-center" id="nric" name="no_kp_or_permit"
                                        placeholder="Sila masukkan no. kad pengenalan tanpa '-'">
                                </div>
                                <div class="form-group d-flex justify-content-center pt-5">
                                    <button type="button" class="btn m-1 text-white text-capitalize"
                                        style="background-color: #1d1da1;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        {{ __('landing.imbas_kod_qr') }}
                                    </button>
                                    <h1 id="maelhensem"></h1>
                                    <input type="submit" class="btn text-white text-capitalize m-1"
                                        style="background-color: #1d1da1;" value="{{ __('landing.semak') }}">
                                </div>
                            </form>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            {{ __('landing.imbas_kod_qr') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="qr-reader" style="width:500px"></div>
                                            <div id="qr-reader-results"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">{{ __('landing.batal') }}</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <script type="text/javascript" src="{{ URL::asset('js/html5-qrcode.min.js') }}"></script>
                        <script>
                            var resultContainer = document.getElementById('qr-reader-results');
                            console.log('resultContainer', resultContainer)
                            var lastResult, countResults = 0;

                            function ismaelPegawai(url) {
                                window.location.assign(url);
                            }


                            function onScanSuccess(decodedText, decodedResult) {
                                console.log('onScanSuccess')
                                //console.log(`Scan result ${decodedText}`, decodedResult);
                                // var url = 'http://127.0.0.1:8000/keputusan_qr?qr=' + id_saja;
                                // var maelhensem = document.getElementById('maelhensem');
                                // maelhensem.innerHTML = decodedText;
                                //ismaelPegawai(url);
                                // location.replace('https://google.com');
                                // document.location.href = 'https://google.com',true;
                                // return false;
                                // var id_saja = 1;'/keputusan_qr?qr=' + id_saja
                                // fetch()
                                //     .then((response)=> {
                                //         console.log(response)
                                // })
                                // $.ajax({
                                //     url: '/keputusan_qr?qr=1',                                    
                                // }, success: function (result) {
                                //     console.log(result)
                                // })
                                if (decodedText !== lastResult) {
                                    ++countResults;
                                    lastResult = decodedText;
                                    // Handle on success condition with the decoded message.
                                    // document.getElementById('maelhensem').innerText = 'lollll';
                                    console.log(`Scan result ${decodedText}`, decodedResult);
                                    // document.getElementById('maelhensem').innerText = 'lollll';
                                    //document.getElementById('maelhensem').innerText = 'lollll';
                                    id = `${decodedText}`;
                                    // console.log('id', id)

                                    var url = '/keputusan_qr?qr=' + id;
                                    // maelhensem.innerHTML = decodedText;
                                    document.location.href = url;
                                }
                            }

                            var html5QrcodeScanner = new Html5QrcodeScanner(
                                "qr-reader", {
                                    fps: 10,
                                    qrbox: 250
                                });
                            html5QrcodeScanner.render(onScanSuccess);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
