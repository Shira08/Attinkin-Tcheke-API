<nav class="navbar navbar-expand-lg bg-white shadow-sm navbar-light sticky-top">
    <a href="" class=" d-flex  mx-4">
        <h5 class="text-primary  mb-0"> Dashboard Hôpital</h5>
    </a>
    <button class="navbar-toggler" 
    type="button"
    data-toggle="collapse" 
    data-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" 
    aria-expanded="false" 
    aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     

      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <div class="navbar-nav align-items-center ms-auto" >
            <a href="{{route('dashboard-hospital')}}" class="{{Request::is('dashboard-hospital')?'active':''}} nav-link me-4 btn">
                <i class="fa fa-tachometer-alt me-lg-2"></i>
                <span class="">Dashboard</span>
            </a>
    
            <a href="{{route('list.bloodbag')}}" class="{{Request::is('list.bloodbag')?'active':''}} nav-link btn ">
                <i class="fa-solid fa-tablets me-2"></i>
                <span class="">Poche de sang</span> <!-- ajout d'illustration-->
            </a>
    
            <div class="nav-item dropdown mx-4 btn ">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <!--img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">-->
                    <span class=" fw-bold"><i class="fa-solid fa-user me-2"></i>John Doe</span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end bg-white shadow border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">Mon Profile</a>
                    <a href="#" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
      </div>
    
</nav>