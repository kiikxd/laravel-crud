@extends('vendor.layoutfirst')

@section('title', 'Home')

@section('content')

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container">
                    <h1 class="text-center mb-4">
                        Welcome to Islamic Festival Competition
                        <small class="d-block mt-3 text-muted">Halaman Utama</small>
                    </h1>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row mb-4 justify-content-center">
                        <div class="d-flex col-md-12 justify-content-center">
                            <!-- Hero Image -->
                            <img src="{{ asset('images/kbui.jpg') }}"
                            alt="Islamic Festival Competition" class="img-fluid rounded-3 shadow-sm">
                        </div>
                    </div>

                    <h4 class="text-center mb-4 text-info">For more information, you can choose the option below</h4>

                    <div class="row justify-content-center">
                        <!-- Card 1: Lomba -->
                        <div class="col-lg-3 col-md-4 mb-4">
                            <div class="card border-primary shadow-sm">
                                <div class="card-header bg-primary text-white text-center">
                                    <h3 class="card-title mb-0">Lomba</h3>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center" style="height: 150px;">
                                    <i class="fas fa-trophy fa-5x text-primary"></i>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="./contests" class="btn btn-primary">Go to Page <i class=" fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2: Peserta -->
                        <div class="col-lg-3 col-md-4 mb-4">
                            <div class="card border-primary shadow-sm">
                                <div class="card-header bg-primary text-white text-center">
                                    <h3 class="card-title mb-0">Peserta</h3>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center" style="height: 150px;">
                                    <i class="fas fa-user fa-5x text-primary"></i>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="./participants" class="btn btn-primary">Go to Page <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3: Juri -->
                        <div class="col-lg-3 col-md-4 mb-4">
                            <div class="card border-primary shadow-sm">
                                <div class="card-header bg-primary text-white text-center">
                                    <h3 class="card-title mb-0">Juri</h3>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center" style="height: 150px;">
                                    <i class="fas fa-gavel fa-5x text-primary"></i>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="./judges" class="btn btn-primary">Go to Page <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
