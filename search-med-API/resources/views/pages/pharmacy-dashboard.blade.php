@extends('layouts.base',['title'=> 'Pharmacie-Dashboard'])

@section('content')
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.partials._nav')
         
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 d-flex justify-content-center">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class=" fa-solid fa-house-medical" style="color: rgb(24, 241, 169); font-size: 3em" ></i>
                            <div class="ms-3">
                                <p class="mb-2">Nombre total de médicaments ajoutés</p>
                                <h6 class="mb-0">1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-2x fa-solid fa-hospital" style="color: rgb(211, 118, 3); font-size: 2.8em"></i>
                            <div class="ms-3">
                                <p class="mb-2 pb-4">Nombre total de médicaments mise à jour</p>
                                <h6 class="mb-0">34</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-pills" style="color: rgb(2, 108, 29); font-size: 3em"></i>
                            <div class="ms-3">
                                <p class="mb-2">Nombre total de médicaments supprimés</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Derniere médicaments ajoutés</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Groupe Sanguins</th>
                                    <th scope="col">Quantité(nombre de poches)</th>
                                    <th scope="col">Volume</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Groupe A+</td>
                                    <td>50</td>
                                    <td>250ml</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Footer Start -->
            @include('layouts.partials._footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection