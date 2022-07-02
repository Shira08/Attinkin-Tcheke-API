@extends('layouts.base',['title'=> 'Hopital-Connexion'])

@section('content')
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
               
                <div class="col-12 col-sm-8 col-md-6 col-lg-9 col-xl-4">
                    <div class="shadow rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="{{route('login-hospital')}}" method="POST">
                            @csrf
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            <div class="d-flex align-items-center justify-content-between mb-3">
                            
                                <h4 class="text-primary">Admin-Dash</h4>
                            
                            <p>Hopital connexion</p>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" name="email" value="{{old('email')}}" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                          
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="password" value=""  placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">
                            Connexion
                        </button>
                        </form>
  
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

@endsection
