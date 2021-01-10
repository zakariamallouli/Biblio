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
            <!-- Dark table -->
<div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Liste des Adherents</h3>
        </div>
        <div class="table-responsive text-center">
          <table class="table align-items-center table-light">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">CIN</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Email_Verifié</th>
                <th scope="col">Telephone</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="list">
                @foreach($users as $a)
              <tr>
                <th scope="row">
                    <i class="bg-warning"></i>
                  {{$a->id}}
                </th>
                <td class="budget">
                    {{$a->cin}}
                </td>
                <td>
                    {{$a->name}}
                </td>
                <td>
                    {{$a->email}}
                </td>
                <td>
                  @if($a->email_verified_at == null)
                    <span class="badge badge-danger">{{ 'NON' }}</span>
                  @else
                  <span class="badge badge-success">{{ 'OUI' }}</span>
                  @endif
              </td>
              
              <td>
                {{$a->tel}}
            </td>
            <td>
              <span class="badge badge-light">
                {{ implode(', ', $a->roles()->get()->pluck('name')->toArray()) }}
              </span>
            </td>
                <td>
                    <a href=" {{ route('home.users.edit',$a->id) }} " class="btn btn-info btn-sm">Modifier</a>
                    <!--@can('delete-users')   -->
                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" 
                        class="btn btn-danger btn-sm">Supprimer</a>
                    
                        <form method="post" action="{{ route('home.users.destroy',$a->id) }}">
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                        </form>
                    <!--@endcan  -->
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