@extends('layouts.base',['title'=> 'Pharmacy'])

@section('content')
<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('layouts.partials._nav')
    <!-- Navbar End -->

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12 text-center">
                <h2 class="text-primary">Section Pharmacies</h2>
            </div>
            <div class="col-lg-10 mx-auto grid-margin stretch-card">
                <div class="bg-white shadow rounded h-100 p-4">
                    <h4 class="mb-4 text-secondary">Ajouter une pharmacie</h4>

                    <form action="{{route('save.pharmacy')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="John Doe"
                                        name="pharmacy_name" maxlength="">
                                    <label for="floatingInput">Name</label>
                                    <span class="text-danger">@error('pharmacy_name')
                                        {{$message}}
                                        @enderror</span>

                                </div>
                            </div>
                            <div class="col-md">
                          
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="example@gmail.com"
                                        name="email">
                                    <label for="floatingInput">Email</label>
                                    <span class="text-danger">@error('email')
                                        {{$message}}
                                        @enderror</span>
        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" name="contact" id="floatingPassword"
                                        pattern="\w+[229]\w+[0-9]{2}+[0-9]{2}+[0-9]{2}+[0-9]{2}" placeholder="">
                                    <label for="floatingPassword">Contact: +229xxxxxxxx</label>
                                    <span class="text-danger">@error('contact')
                                        {{$message}}
                                        @enderror</span>
        
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="address"
                                        name="address" maxlength="">
                                    <label for="floatingInput">Addresse</label>

                                    <span class="text-danger">@error('address')
                                        {{$message}}
                                        @enderror</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">

                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <select name="horaire" id="floatingInput" class="form-control"
                                        placeholder="Horaire" class="form-control">
                                        <option disabled selected>Veuillez choisir un horaire</option>
                                        <option value="Tout les jours de 07:00 - 22:00">Tout les jours de 07:00 - 22:00
                                        </option>
                                        <option value="Tout les jours de 08:00 - 23:00">Tout les jours de 08:00 - 23:00
                                        </option>
                                        <option value="Tout les jours de 07:00 - 18:30">Tout les jours de 07:00 - 18:30
                                        </option>
                                        <option value="Tout les jours de 06:30 - 23:00">Tout les jours de 06:30 - 23:00
                                        </option>
                                        <option value="Tout les jours 24h/24">Tout les jours 24h/24</option>
                                    </select>
                                    <label for="floatingInput">Horaire</label>
                                    <span class="text-danger">@error('horaire')
                                        {{$message}}
                                        @enderror</span>
                                </div>
                            </div>
                            <div class="col-md">
                                <legend class="col-form-label pt-0">La pharmacie est-elle de garde ?</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="garde" id="gridRadios1"
                                            value="true" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            oui, elle est de garde
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="garde" id="gridRadios2"
                                            value="false">
                                        <label class="form-check-label" for="gridRadios2">
                                            Non, elle n'est pas de garde!
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">

                            <input type="password" class="form-control" id="floatingInput" placeholder="Password"
                                name="password">
                            <label for="floatingInput">Password</label>

                            <span class="text-danger">@error('password')
                                {{$message}}
                                @enderror</span>
                        </div>

                        <button type="submit" name="add-pharmacy" class="btn btn-primary col-12">Ajouter une
                            pharmacie</button>

                    </form>
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