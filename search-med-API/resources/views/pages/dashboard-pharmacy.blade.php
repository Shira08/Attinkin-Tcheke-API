@extends('layouts.dashboard-base',['title'=> 'Pharmacy Dashboard'])

@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row  g-4 d-flex justify-content-center" style="height: 100%">
        
            <div class="row ">
                <div
                    class="col-lg-10 col-12 rounded-bottom h-100 py-4 mx-auto bg-primary d-flex align-items-center justify-content-center">
                    <h4 class="text-white ">Médicaments</h4>
                </div>
            </div>
        
        <div class="col-sm-6 col-xl-3">
            <div class="bg-white shadow rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-pills" style="color: rgb(24, 241, 169); font-size: 3em"></i>
                <div class="ms-3">
                    <p class="mb-2">Nombre total de médicaments ajoutés</p>
                    <h6 class="mb-0">1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-white shadow rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-pills" style="color: rgb(211, 118, 3); font-size: 2.8em"></i>
                <div class="ms-3">
                    <p class="mb-2 ">Nombre total de médicaments mise à jour</p>
                    <h6 class="mb-0">34</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-white shadow rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-pills" style="color: rgb(2, 108, 29); font-size: 3em"></i>
                <div class="ms-3">
                    <p class="mb-2">Nombre total de médicaments supprimés</p>
                    <h6 class="mb-0">14</h6>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-10 col-12 mx-lg-auto px-0">
                <h6 class="my-3">Dernier Médicaments Ajoutés</h6>
                <div class="bg-white shadow rounded h-auto table-responsive  p-4">
                    <table class="table-responsive" id="myDataTable">
                        <thead>
                            <tr>
                                <th scope="">N°</th>
                                <th scope="">Nom Pharmacie</th>
                                <th scope="">Email</th>
                                <th scope="">Contact</th>
                                <th scope="">Addresse</th>
                                <th scope="">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($displayData as $data)
                            <tr>
                                <th scope="row">{{$data->id}}</th>
                                <td>{{$data->pharmacy_name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->contact}}</td>
                                <td>{{$data->address}}</td>
                                

                                <td class="d-flex justify-content-around">
                                    <a href="edit-pharmacy/{{$data->id}}" class="">
                                        <i class="fa fa-pen" aria-hidden="true"></i></a>
                                    <a href="delete-pharmacy/{{$data->id}}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection