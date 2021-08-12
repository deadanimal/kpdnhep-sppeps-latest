@extends('layouts.baseUser')

@section('content')


    <div class="row d-flex justify-content-center my-3">
        
        <div class="col-6">
            <div class="card bg-cover text-center" style="bg-success">
                <div class="card-body z-index-2 bg-secondary py-9">
                    <h2 class="text-white"><i class="far fa-check-circle fa-4x"></i></h2>
                    <p class="text-white">
                        Permohonan anda berjaya dihantar.
                    </p>
                    <a href="/permohonan" class="btn btn-icon bg-gradient-primary mt-3 mb-0">
                        Semak Status Permohonan
                        <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modal-1').modal('show');
        });
    </script>
    {{-- var modalToggle = document.getElementById('modal-1') // relatedTarget
myModal.show(modalToggle)    
</script> --}}
@endsection
