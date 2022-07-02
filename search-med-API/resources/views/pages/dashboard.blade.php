@extends('layouts.base')

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
                                <p class="mb-2">Nombre total des pharmacies inscrites</p>
                                <h6 class="mb-0">34</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-2x fa-solid fa-hospital" style="color: rgb(211, 118, 3); font-size: 2.8em"></i>
                            <div class="ms-3">
                                <p class="mb-2 pb-4">Nombre total des hopitaux inscrits</p>
                                <h6 class="mb-0">14</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-pills" style="color: rgb(2, 108, 29); font-size: 3em"></i>
                            <div class="ms-3">
                                <p class="mb-2">Nombre total de médicaments enregistrés</p>
                                <h6 class="mb-0">12234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-droplet" style="color: rgb(128, 15, 3); font-size: 3em"></i>
                            <div class="ms-3">
                                <p class="mb-2">Nombre total de poche de sang enregistrées</p>
                                <h6 class="mb-0">534</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-street-view" style="color: rgb(63, 63, 63); font-size: 3em"></i>
                            <div class="ms-3">
                                <p class="mb-2">Nombre total d'administrateurs</p>
                                <h6 class="mb-0">2</h6>
                            </div>
                        </div>
                    </div>
                    <!--div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div-->
                </div>
            </div>  

            <!-- Recent Sales Start -->
            <div class="container-fluid">
                <div class=" text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Derniere pharmacie inscrits</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-lg-auto px-0">
                            <div class="bg-white shadow rounded h-auto table-responsive p-4">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                <th scope="col">Nom du médicament</th>
                                <th scope="col">Type</th>
                                <th scope="col">Dosage</th>
                                <th scope="col">Type de person</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Doliprane</td>
                                            <td>comprimé, Sirop</td>
                                            <td>1000mg/500mg</td>
                                            <td>Enfant/adulte</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Netilmicine</td>
                                            <td>Injectable</td>
                                            <td>500mg</td>
                                            <td>Enfant</td>
                                        </tr>
            
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Contacts</th>
                                    <th scope="col">Horaire d'ouverture</th>
                                    <th scope="col">Mode de paiement</th>
                                    <th scope="col">Itinéraire</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>

                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div-->
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