@extends('layouts.client')
@section('content')
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Livres & Media</h2>
                    <span class="underline center"></span>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-media-gird">
                        <div class="container">
                            <div class="row">
                                <!-- Start: Search Section -->
                                <section class="search-filters">
                                    <div class="container">
                                       
                                    </div>
                                </section>
                                <!-- End: Search Section -->

                                <div class="row my-4">
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
                        
                                <div class="row my-4">
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

                            </div>
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="books-gird">
                                        <ul>
                                            @foreach ($livres as $l)
                                            <li>
                                                <figure>
                                                    <img src="{{ asset('livres/'.$l->image) }}" alt="Book">
                                                    <figcaption>
                                                        <p><strong>{{$l->titre}}</strong></p>
                                                        <p><strong>Auteur : </strong>  {{$l->auteur['nom']}} {{$l->auteur['prenom']}}</p>
                                                        <p><strong>Prix : </strong> <span class="badge badge-info">{{$l->prix}} DH</span></p>
                                                    </figcaption>
                                                </figure> 
                                                <div class="single-book-box">
                                                    <div class="post-detail">
                                                        <header class="entry-header">
                                                            <h3 class="entry-title">{{$l->titre}}</h3>
                                                            <ul>
                                                                <li><strong>Auteur :</strong> {{$l->auteur['nom']}} {{$l->auteur['prenom']}}</li>
                                                                <li><strong>Genre :</strong> {{$l->genre['genre']}}</li>
                                                            </ul>
                                                        </header>
                                                        <div class="entry-content">
                                                            <p>{{$l->resume}}</p>

                                                        </div>
                                                        <footer class="entry-footer">
                                                            @if ($l->qte > 1)
                                                                <form action="{{url('/reservation')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="idlivre" value="{{$l->id}}">
                                                                    <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                                                                    <input type="hidden" name="statut" value="Reservé">
                                                                    <button type="submit" class="btn btn-info"><i class="fa fa-shopping-cart mr-2"></i>
                                                                        Reservé Livre</a>
                                                                </form>
                                                            @else
                                                                <a class="btn btn-danger" disabled><i class="fa fa-ban mr-2"></i>
                                                                    Quantité Epuisé</a>
                                                            @endif
                                                        </footer>
                                                    </div>
                                                </div>                                       
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                        <div class="widget widget_related_search open" data-accordion>
                                            <h4 class="widget-title" data-control>Rechercher Par :</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Auteur</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            @foreach ($auteurs as $a)
                                                                <li><a href="{{url('/livre/'.$a->id)}}">{{$a->nom}} {{$a->prenom}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Genre</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            @foreach ($genres as $g)
                                                                <li><a href="{{url('/livregenre/'.$g->id)}}">{{$g->genre}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->
@endsection