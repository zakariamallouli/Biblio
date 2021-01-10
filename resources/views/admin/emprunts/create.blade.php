@extends('layouts.admin')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            </div>
        </div>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5" style="box-shadow: 5px 5px 5px rgb(35, 28, 134);">
                        <div class="card-header" style="background-color: rgb(88, 119, 223); ">
                            <h1 style="color: white;">Ajouter Emprunt</h1>
                        </div>
                        <div class="card-body">
                            <div class="table">
                             <form method="post" action="{{ route('home.emprunts.store') }}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                  <div class="form-group">

                                    <div class="row mt-2">
                                        <label class="col-md-4" for="livre">Livre
                                            <select class="form-control" name="idlivre" id="livre">
                                              @foreach ($livres as $l)
                                                <option value="{{$l->id}}">{{$l->titre}}</option>
                                              @endforeach
                                            </select>
                                        </label>
 
                                         <label class="col-md-4" for="user">Adhérent
                                             <select class="form-control" name="iduser" id="user">
                                               @foreach ($users as $u)
                                                 <option value="{{$u->id}}">{{$u->name}}</option>
                                               @endforeach
                                             </select>
                                         </label>
                                     </div>

                                    <div class="row mt-3"> 
                                        <label class="col-md-4">Date Emprunt<input type="date" name="date_emprunt" class="form-control" required></label>
                                        <label class="col-md-4">Date Retour<input type="date" name="date_retour" class="form-control" required></label>
                                        <label class="col-md-4">Statut
                                        <select class="form-control" name="statut">
                                            <option value="Reserve">Reserve</option>
                                            <option value="Emprunté">Emprunté</option>
                                            <option value="Rendu">Rendu</option>
                                          </select>
                                      </label>
                                        
                                    </div>                          
                                  </div>

                                   <div class="form-group text-center">
                                      <input type="submit" class="btn btn-info" value="Ajouter">
                                  </div>
                              </form>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection