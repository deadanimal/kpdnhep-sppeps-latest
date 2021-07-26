@extends('layouts.baseUser')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="p-2 text-capitalize">
            <h5 class="h3 text-dark pt-4 text-center"><strong> Arkib Bergambar</strong></h5>
        </div>
        <div class="p-2 text-capitalize">
            <h6 class="text- capitalize text-bold text-center">Arkib Bergambar 1 - Gambar 1</h6>
        </div>
    </div>

    <div class="row m-4">
        <div class="col-md-6">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="page-header min-vh-50 m-3 border-radius-xl">
                            <img class="d-block w-100" src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80" alt="First slide">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="page-header min-vh-50 m-3 border-radius-xl">
                            <img class="d-block w-100" src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80" alt="2nd slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="page-header min-vh-50 m-3 border-radius-xl">
                            <img class="d-block w-100" src="https://images.unsplash.com/photo-1552793494-111afe03d0ca?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80" alt="3rd slide">
                        </div>
                    </div>
                    
                </div>
                <div class="min-vh-75 position-absolute w-100 top-0">
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>



        </div>

        <div class="col-md-6">
            <p>nama program: jkasjd</p>
            <p>tempat: jkasjd</p>
            <p>tarikh : jkasjd</p>
            <p>keterangan</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae pariatur minus deleniti velit cumque
                dolore tempora commodi. Maxime vero quis repudiandae beatae perferendis est culpa officia explicabo!
                Voluptates, officiis non!</p>

        </div>
    </div>




</div>


@stop