@extends('layouts.base-admin-hq')

@section('content')
    <div class="container-fluid py-4 d-flex justify-content-center flex-wrap" style="height: 100vh;">
        <div class="row">
            {{-- <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>Semakan Status EPS</strong></h5>
            </div> --}}
        </div>

        <div class="row m-4" style="width: 80%;">
            <div class="card card-frame">
                <div class="card-body">
                    <div class="container p-2 m-0 d-flex justify-content-center flex-wrap" style=" width: 100%;">


                        <div class="d-flex justify-content-center align-items-center">
                            <div id="qr-reader" style="width:500px"></div>
                            <div id="qr-reader-results"></div>
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

                                    var url = '/keputusan_qr_penguatkuasa?qr=' + id;
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
