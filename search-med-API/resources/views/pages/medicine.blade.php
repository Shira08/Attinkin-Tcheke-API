@extends('layouts.dashboard-base',['title'=> 'Médicament'])

@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row g-4 d-flex justify-content-center" style="height: 100%">
        <div class="row ">
            <div
                class="col-lg-10 col-12 rounded-bottom h-100 py-4 mx-auto bg-primary d-flex align-items-center justify-content-center">
                <h4 class="text-white ">Médicaments</h4>
            </div>
        </div>

        <div class="row d-flex justify-content-center m-0 p-0" style="overflow: hidden;">

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

                <form action="{{route('import.medicine')}}" method="post" enctype="multipart/form-data"
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
                <h6 class="mb-4">Liste des médicaments ajoutés</h6>
                <div class="bg-white shadow rounded table-responsive h-auto p-4">
                    <table class="table table-bordered " id="myDataTable">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nom du médicament</th>
                                <th scope="col">Type</th>
                                <th scope="col">Dosage</th>
                                <th scope="col">Type de person</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($medicines))
                            @foreach ($medicines as $medicine)
                            <tr>
                                <th scope="row">{{$medicine->id}}</th>
                                <td>{{$medicine->name}}</td>
                                <td>{{$medicine->type}}</td>
                                <td>{{$medicine->dosage}}</td>
                                <td>{{$medicine->people}}</td>
                                <td class="d-flex">
                                    <button type="button" class="bg-white border-0 edit-button" 
                                        data-toggle="modal" data-target-id="{{$medicine->id}}"
                                        data-target-name="{{$medicine->name}}" data-target-type="{{$medicine->type}}"
                                        data-target-dosage="{{$medicine->dosage}}"
                                        data-target-people="{{$medicine->people}}" data-target="#modalEdit">
                                        <i class="fa fa-pen text-primary" aria-hidden="true"></i></button>

                                        <form method="POST" action="{{ route('delete.medicine', $medicine->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="bg-white border-0 delete" title='Delete'><i class="fa fa-trash text-primary"
                                                aria-hidden="true"></i></button>
                                        </form>
                                    <!--a href="delete-medicine/{{$medicine->id}}"><i class="fa fa-trash "
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
                                    <label for="type" Class="col-form-text">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option selected disabled>--Veuillez choisir une option--</option>
                                        <option value="comprimé">Comprimé</option>
                                        <option value="sirop">Sirop</option>
                                        <option value="capsule">Capsule</option>
                                        <option value="gellule">Géllule</option>
                                        <option value="solution aqueuse">solution aqueuse</option>
                                        <option value="inhalation">Inhalation</option>
                                        <option value="injectable">Injectable</option>
                                        <option value="suspension orale">Suspension orale</option>
                                        <option value="solution buvable">Solution buvable</option>
                                        <option value="collyre">Collyre</option>
                                        <option value="lotion">Lotion</option>
                                        <option value="pommade">Pommade</option>
                                        <option value="crème">Crème</option>
                                        <option value="goutte orale">Goutte orale</option>
                                        <option value="solution pour perfusion">Solution pour Perfusion</option>
                                        <option value="pulvérisation nasale">Pulvérisation nasale</option>
                                    </select>
                                    <!--input type="text" name="type" id="type" class="form-control"-->
                                </div>
                                <div class="form-group">
                                    <label for="dosage" Class="col-form-text">Dosage</label>
                                    <select name="dosage" id="dosage" class="form-control">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                    <!--input type="text" name="dosage" id="dosage" class="form-control"-->
                                </div>
                                <div class="form-group">
                                    <label for="" Class="col-form-text">People</label>
                                    <select name="people" id="people" class="form-control">
                                        <option value="Adulte" >Adulte</option>
                                        <option value="Enfant" >Enfant</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary px-5">Edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection