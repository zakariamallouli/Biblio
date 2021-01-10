@extends('layouts.admin')
@section('content')
<section class="content">
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
            <a href="{{ route('home.emprunts.create') }}" class="btn btn-primary"><i class="ni ni-fat-add"></i>Nouveau Emprunts</a>
        </p>

        <!-- Dark table -->
<div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Liste des Emprunts</h3>
        </div>
        <div class="table-responsive text-center">
          <table class="table align-items-center table-light table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Livre</th>
                <th scope="col">Adhérent</th>
                <th scope="col">Date Emprunt</th>
                <th scope="col">Date Retour</th>
                <th scope="col">Statut</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($emprunts as $a)
            <tr>
              <th scope="row">
                  <i class="bg-warning"></i>
                {{$a->id}}
              </th>
              <td>
                  {{$a->livre['titre']}}
              </td>
              <td>
                  {{$a->user['nom']}}
              </td>              
              <td>
                {{$a->date_emprunt}}
            </td>
            <td>
                {{$a->date_retour}}
            </td>
            <td>
                {{$a->statut}}
            </td>
              <td>
                  <a href=" {{ route('home.emprunts.edit',$a->id) }} " class="btn btn-info btn-sm">Modifier</a>
                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" 
                      class="btn btn-danger btn-sm">Supprimer</a>
                      <form method="post" action="{{ route('home.emprunts.destroy',$a->id) }}">
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