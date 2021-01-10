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
                            <h1 style="color: white;">Modifier Auteur</h1>
                        </div>
                        <div class="card-body">
                             <form method="post" action="{{ route('home.auteurs.update',$auteur->id) }}" enctype="multipart/form-data">
                             @method('PUT')   
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 
                                 

                                  <div class="form-group">

                                    <div class="row mt-4">
                                   <br>
                                         
                                       
                                        <label class="col-md-4" style="text-align: center;">Nom<input type="text" name="nom" class="form-control" value="{{ $auteur->nom }}" required> <br></label>
                                        <label class="col-md-4" style="text-align: center;">Prenom<input type="text" name="prenom" class="form-control" value="{{ $auteur->prenom }}" required></label><br>
                                        <label class="col-md-4" for="nationalite">Nationalité
                                            <select value="{{ $auteur->prenom }}" class="form-control" name="nationalite" id="nationalite">
                                              <option value="France">France</option>
                                              <option value="Maroc">Maroc</option>
                                              <option value="Egypt">Egypt</option>
                                              <option value="England">England</option>
                                              <option value="Espagne">Espagne</option>
                                              <option value="Algerie">Algerie</option>
                                              <option value="Belgique">Belgique</option>
                                            </select></label>
                                      </div>

                                    <div class="row">
                                        <label class="col-md-12" for="bio">Biographie
                                        <textarea class="form-control" name="biographie" id="bio" rows="5">{{$auteur->biographie}}</textarea></label>
                                    </div>

                                     
                                </div>

                                
                                   <div class="form-group text-center">
                                      <input type="submit" class="btn btn-info" value="Modifier">
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