@extends('layouts.base',['title'=> 'Pharmacy List'])

@section('content')
<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('layouts.partials._nav')
    <!-- Navbar End -->

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-11 mx-auto grid-margin stretch-card">
                <div class="bg-black-50 shadow rounded h-100 p-4">
                    <div class="col-12 d-flex justify-content-between">
                    <h6 class="mb-4 text-primary">Liste des pharmacies</h6>
                     <h6><a href="{{route('add.pharmacy')}}" class="text-secondary">Ajouter une pharmacie</a></h6>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
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
    <!-- Form End -->


    <!-- Footer Start -->
    @include('layouts.partials._footer')
    <!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
@endsection