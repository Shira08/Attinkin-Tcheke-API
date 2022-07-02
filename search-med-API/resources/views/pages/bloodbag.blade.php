@extends('layouts.dashboard-hospital',['title'=> 'Blood bag'])

@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row g-4 d-flex justify-content-center" style="height: 100%">
        <div class="row ">
            <div
                class="col-lg-10 col-12 rounded-bottom h-100 py-4 mx-auto bg-primary d-flex align-items-center justify-content-center">
                <h4 class="text-white ">Poche de sangs</h4>
            </div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-lg-10 col-12 mt-5 mx-auto  text-center align-items-center ">
                <p class="text-secondary">Veuillez insérer un fichier excel qui respecte la structure du tableau en
                    dessous!! Merci.</p>
                <div class="col-lg-10 col-12 mx-auto  text-center align-items-center">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                </div>

                <form action="{{route('import.bloodbag')}}" method="post" enctype="multipart/form-data"
                    class="d-flex flex-column flex-lg-row shadow justify-content-center p-4 my-5 rounded align-middle">
                    @csrf
                    <div class="form-group ">
                        <input type="file" name="excel_file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary my-lg-0 my-2">Upload excel file</button>
                        <div class="div">
                            @error('excel_file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-10 col-12 mx-auto">
                <h6 class="mb-4">Liste des poches de sang ajoutés</h6>
                <div class="bg-white shadow rounded table-responsive h-auto p-4">
                    <table class="table table-bordered " id="myDataTable">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Groupe sanguins+rhésus</th>
                                <th scope="col">Volume(ml)</th>
                                <th scope="col">Quantity(Nombre disponible)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($bloodbags))
                            @foreach ($bloodbags as $bloodbag)
                            <tr>
                                <th scope="row">{{$bloodbag->id}}</th>
                                <td>{{$bloodbag->bloodgroup}}</td>
                                <td>{{$bloodbag->volume}}</td>
                                <td>{{$bloodbag->quantity}}</td>
                                <td class="d-flex">
                                    <button type="button" class="bg-white border-0 edit-button" 
                                        data-toggle="modal" data-target-id="{{$bloodbag->id}}"
                                        data-target-name="{{$bloodbag->bloodgroup}}" 
                                        data-target-dosage="{{$bloodbag->volume}}"
                                        data-target-people="{{$bloodbag->quantity}}" data-target="#modalEdit">
                                        <i class="fa fa-pen text-primary" aria-hidden="true"></i></button>

                                        <form method="POST" action="{{ route('delete.bloodbag', $bloodbag->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="bg-white border-0 delete" title='Delete'><i class="fa fa-trash text-primary"
                                                aria-hidden="true"></i></button>
                                        </form>
                                    <!--a href="delete-bloodbag/{{$bloodbag->id}}"><i class="fa fa-trash "
                                            aria-hidden="true"></i></a-->
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3">No data found</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Modifier les informations d'un médicament</h5>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="" Class="col-form-text">Nom du médicament</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" Class="col-form-text">Type</label>
                                    <select name="type" >
                                        <option >--Please choose an option--</option>
                                        <option id="type" value="" selected></option>
                                        <option value="hamster">Hamster</option>
                                        <option value="parrot">Parrot</option>
                                        <option value="spider">Spider</option>
                                        <option value="goldfish">Goldfish</option>
                                    </select>
                                    <!--input type="text" name="type" id="type" class="form-control"-->
                                </div>
                                <div class="form-group">
                                    <label for="" Class="col-form-text">Dosage</label>
                                    <input type="text" name="dosage" id="dosage" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" Class="col-form-text">People</label>
                                    <input type="text" name="people" id="people" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary px-5">Edit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection