@extends('layouts.base',['title'=> 'Home'])

@section('content')
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
               <div class="col-12 d-flex justify-content-center ">
                   <p class="shadow p-3 rounded fs-6">
                   <span class="fw-bold text-primary fs-5">Bienvenue sur la page d'acceuil!!!</span> Veuillez selectionner le type approprié s'il vous plait!!!
                   </p>
            </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-9 col-xl-4">
                    <div class="shadow rounded p-4 p-sm-5 my-4 mx-3 d-flex flex-column">
                        <a href="{{route('admin-login')}}" class="bg-primary bg-gradient rounded text-center text-white fw-bold fs-4 py-3 w-100 mb-4">
                            Admin
                        </a>
                        <a href="{{route('pharmacy-login')}}" class="bg-primary bg-gradient rounded text-center text-white fw-bold fs-4 py-3 w-100 mb-4">
                            Pharmacie
                        </a>
                        <a href="{{route('hospital-login')}}" class="bg-primary bg-gradient rounded text-center text-white fw-bold fs-4 py-3 w-100 mb-4">
                            Hopital
                        </a>
                        
  
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

@endsection
