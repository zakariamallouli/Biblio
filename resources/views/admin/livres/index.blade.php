@extends('layouts.admin')
@section('content')
<section class="content">
  <style type="text/css">
    .cart-item-image {
        width: 40px;
        height: 50px;
        border-radius: 5%;
        border: #E0E0E0 1px solid;
        vertical-align: middle;
        margin-right: 15px;
    }
</style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            </div>
        </div>

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
        <p>
            <a href="{{ route('home.livres.create') }}" class="btn btn-primary"><i class="ni ni-fat-add"></i>Nouveau Livre</a>
        </p>

        <!-- Dark table -->
<div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Liste des Livres</h3>
        </div>
        <div class="table-responsive text-center">
          <table class="table align-items-center table-light table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Titre</th>
                <th scope="col">Langue</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th scope="col">Auteur</th>
                <th scope="col">Genre</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($livres as $a)
            <tr>
              <th scope="row">
                  <i class="bg-warning"></i>
                {{$a->id}}
              </th>
              <td class="budget">
                  <img class="cart-item-image" src="{{asset('livres/'.$a->image)}}" alt="">
              </td>
              <td>
                  {{$a->titre}}
              </td>
              <td>
                  {{$a->langue}}
              </td>              
              <td>
                {{$a->qte}}
            </td>
            <td>
                {{$a->prix}} DH
            </td>
            <td>
                {{$a->auteur['prenom']}}
            </td>
            <td>
              {{$a->genre['genre']}}
          </td>
              <td>
                  <a href=" {{ route('home.livres.edit',$a->id) }} " class="btn btn-info btn-sm">Modifier</a>
                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" 
                      class="btn btn-danger btn-sm">Supprimer</a>
                      <form method="post" action="{{ route('home.livres.destroy',$a->id) }}">
                          @method('DELETE')
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                      </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>    
</div>
</section>
@endsection