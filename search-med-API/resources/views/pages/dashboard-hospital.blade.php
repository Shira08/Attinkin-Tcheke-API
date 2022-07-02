@extends('layouts.dashboard-hospital',['title'=> 'Hopital Dashboard'])

@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row  g-4 d-flex justify-content-center" style="height: 100%">
        
            <div class="row ">
                <div
                    class="col-lg-10 col-12 rounded-bottom h-100 py-4 mx-auto bg-primary d-flex align-items-center justify-content-center">
                    <h4 class="text-white ">Poches de sang</h4>
                </div>
            </div>
        
        <div class="col-sm-6 col-xl-3">
            <div class="bg-white shadow rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-pills" style="color: rgb(24, 241, 169); font-size: 3em"></i>
                <div class="ms-3">
                    <p class="mb-2">Nombre total de poches de sang ajoutés</p>
                    <h6 class="mb-0">1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-white shadow rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-pills" style="color: rgb(211, 118, 3); font-size: 2.8em"></i>
                <div class="ms-3">
                    <p class="mb-2 ">Nombre total de poches de sang mise à jour</p>
                    <h6 class="mb-0">34</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-white shadow rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-pills" style="color: rgb(2, 108, 29); font-size: 3em"></i>
                <div class="ms-3">
                    <p class="mb-2">Nombre total de poches de sang supprimés</p>
                    <h6 class="mb-0">14</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-12 mx-lg-auto px-0">
                <h6 class="my-3">Dernier poches de sang Ajoutés</h6>
                <div class="bg-white shadow rounded h-auto table-responsive p-4">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Groupe sanguins+rhésus</th>
                                <th scope="col">Volume(ml)</th>
                                <th scope="col">Quantity(Nombre disponible)</th>
                                <!--th scope="col">Action</th-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>A+</td>
                                <td>250</td>
                                <td>20</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection