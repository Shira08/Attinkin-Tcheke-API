@extends('layouts.base',['title'=> 'Hopital'])
    
    @section('content')
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.partials._nav')
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <form action="">
                    <div class="row g-4">
                        <div class="col-12 text-center">
                            <h2 class="text-primary">Section Hôpital</h2>
                        </div>
                        <div class="col-lg-10 mx-auto grid-margin stretch-card">
                            <div class="bg-white shadow rounded h-100 p-4">
                                <h4 class="mb-4 text-secondary">Ajouter un hôpital</h4>
                            <div class="row">
                            <div class="col-md">
                               <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="John Doe" name="name" maxlength="20" required>
                                    <label for="floatingInput">Name</label>
                                </div>
                               </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   
                                    <input type="tel" class="form-control" name="contact" id="floatingPassword" pattern=""
                                    placeholder="Contact" required>
                                    <label for="floatingPassword">Contact</label>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                            placeholder="Indication" name="address" maxlength="30" required>
                                            <label for="floatingInput">Indication</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="url" class="form-control" id="floatingInput"
                                            placeholder="Itinéraire" name="address" required>
                                            <label for="floatingInput">Itinéraire</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput"
                                    placeholder="Password" name="password" required>
                                    <label for="floatingInput">Password</label>
                                </div>
                                
                              <button type="submit" class="btn btn-primary col-12">Ajouter une hôpital</button>
                                                          
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
       
            @include('layouts.partials._footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>  
    @endsection  