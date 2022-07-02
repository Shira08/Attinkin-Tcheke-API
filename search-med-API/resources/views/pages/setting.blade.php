@extends('layouts.base',['title'=> 'Hopital'])
    
    @section('content')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.partials._nav')
            <!-- Navbar End -->
            <div class="container-fluid bg-primary rounded" style="height: 15vh">
                <h4 class="text-white ps-4 pt-3">Settings</h4>
            </div>
            <!-- Blank Start -->
            <div class="container-fluid">
                <div class="row mt-n4 ">
                    <div class="col-lg-3 mb-lg-0 mb-4 col-12">
                      <div class="list-group shadow" id="list-tab" role="tablist">
                        <p class="list-group-item " style="">Profil</p>
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Ajouter un Admin</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Changer votre mot de passe</a>
                      </div>
                    </div>
                    <div class="col-lg-9 col-12 mt-lg-0 mt-4">
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="bg-light h-100 rounded  mx-auto  p-4">
                                <h6 class="mb-4">Créer un Admin</h6>
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputText" class="form-label">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                    </div>
                                    
                                    <button type="submit" name="addAdmin" class="btn btn-primary">Ajouter</button>
                                </form>
                            </div>
                            <div class="bg-light mx-auto mt-5 rounded h-100 p-4">
                                <h6 class="mb-4">Liste des Admins</h6>
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Nom d'Utilisateur</th>
                                            <th scope="col">Mot de passe</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td class="d-flex justify text-center">
                                                <a href="" class="me-3">
                                                    <i class="fa fa-pen" aria-hidden="true"></i></a>
                                                <a href=""><i class="fa fa-trash"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td class="d-flex justify text-center">
                                                <a href="" class="me-3">
                                                    <i class="fa fa-pen" aria-hidden="true"></i></a>
                                                <a href=""><i class="fa fa-trash"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td class="d-flex justify text-center">
                                                <a href="" class="me-3">
                                                    <i class="fa fa-pen" aria-hidden="true"></i></a>
                                                <a href=""><i class="fa fa-trash"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade h-100" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="bg-light rounded w-75 mx-auto h-100 mb-4 p-4">
                                <h6 class="mb-4">Changer Votre Mot de passe</h6>
                                <form action="" method="post">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                    @endif
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputText" class="form-label">Ancien Mot de passe</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            aria-describedby="" name="oldpassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Nouveau Mot de passe</label>
                                        <input type="password" class="form-control" name="newpassword" id="exampleInputPassword1">
                                    </div>
                                    <p>S'il vous plait,vous devez connaitre votre ancien mot de passe.</p>
                                    
                                    <button type="submit" name="changePassword"class="btn btn-primary">Modifier</button>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
  
              
            <!-- Blank End -->
           

            <!-- Footer Start -->
            @include('layouts.partials._footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection