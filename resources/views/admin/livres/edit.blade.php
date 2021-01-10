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
                            <h1 style="color: white;">Ajouter Livre</h1>
                        </div>
                        <div class="card-body">
                            <div class="table">
                             <form method="post" action="{{ route('home.livres.update',$livres->id) }}" enctype="multipart/form-data">
                             @method('PUT')
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                  <div class="form-group">

                                    <div class="row "> 
                                           
                                   
                                        @if($livres->image) 
                                        <label class="col-md-6 mx-auto">Image de Couverture
                                        <input type="file" name="image" class="form-control"  >
                                        <img src="{{ asset('livres/'.$livres->image) }}" alt="image" style="width: 150px;">
                                        </label>
                                       @endif
                                        
                                    </div>

                                    <div class="row mt-3"> 
                                        <label class="col-md-4">Quantité en Stock<input type="text" name="qte" class="form-control"  value="{{ $livres->qte }}" required></label>
                                        <label class="col-md-4">Prix<input type="text" name="prix" class="form-control" value="{{ $livres->prix }}" required></label>
                                        <label class="col-md-4">Titre<input type="text" name="titre" class="form-control" value="{{ $livres->titre }}" required></label>
                                        
                                    </div>

                                    <div class="row mt-2">
                                      <label class="col-md-4">Langue
                                        <select class="form-control" name="langue" id="langue" selected="{{ $livres->langue }}"  require>
                                            <option value="FR">FR</option>
                                            <option value="AR">AR</option>
                                            <option value="EN">EN</option>
                                            <option value="ES">ES</option>
                                          </select>
                                      </label>

                                       <label class="col-md-4" for="genre">Genre
                                           <select class="form-control" name="idgenre" id="genre" selected="{{ $livres->genre }}">
                                             @foreach ($genres as $g)
                                               <option value="{{$g->id}}">{{$g->genre}}</option>
                                             @endforeach
                                           </select>
                                       </label>

                                       <label class="col-md-4" for="auteur">Auteur
                                            <select class="form-control" name="idauteur" id="auteur" selected="{{ $livres->idauteur }}">
                                              @foreach ($auteurs as $a)
                                                <option value="{{$a->id}}">{{$a->nom}} {{$a->prenom}}</option>
                                              @endforeach
                                            </select>
                                        </label>
                                    </div>

                                    <div class="row mt-3">
                                    <label class="col-md-4" for="tag">Tags
                                        <select multiple class="form-control" name="idtag" id="tag" data-live-search="true">
                                          @foreach ($tags as $g)
                                            <option value="{{$g->id}}">{{$g->tage}}</option>
                                          @endforeach
                                        </select>
                                    </label>
                                        <label class="col-md-8" for="resume">Aperçu du Livre
                                        <textarea class="form-control" name="resume" id="resume" rows="5">{{ $livres->resume }}</textarea></label>
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