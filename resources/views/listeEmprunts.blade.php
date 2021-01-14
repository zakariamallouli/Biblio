@extends('layouts.app')
@section('content')
    <!-- End: Page Banner -->

    <!-- Start: Products Section -->
    <div id="content" class="site-content mt-5">
        <div id="primary" class="content-area mt-5">
            <main id="main" class="site-main mt-5">
                <div class="col-md-8 mx-auto">
                    <div class="row mt-5">
                        <div class="col">
                          <div class="card bg-default shadow">
                            <div class="card-header bg-transparent border-0 mt-5">
                              <h3 class="text-white mt-5">Liste des Emprunts : <strong>{{ Auth::user()->name }}</strong></h3>
                            </div>
                            <div class="table-responsive text-center ">
                              <table class="table align-items-center table-light">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Livre</th>
                                    <th scope="col">Date Emprunt</th>
                                    <th scope="col">Date Retour</th>
                                    <th scope="col">Statut</th>
                                  </tr>
                                </thead>
                                <tbody class="list">
                                  @foreach($emprunts as $a)
                                <tr>
                                  <th scope="row">
                                      <i class="bg-warning"></i>
                                    {{$a->livre['titre']}}
                                  </th>
                                  <td>
                                    {{$a->date_emprunt}}
                                    </td>
                                    <td>
                                        {{$a->date_retour}}
                                    </td>
                                    <td>
                                        @if ($a->statut == "Reservé")
                                            En cours de Traitement
                                        @else
                                            {{$a->statut}}
                                        @endif
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
            </main>
        </div>
    </div>
    <!-- End: Products Section -->
@endsection