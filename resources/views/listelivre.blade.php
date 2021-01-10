@extends('layouts.client')
@section('content')
    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <span class="underline center"></span>
            </div>
        </div>
    </section>
    <!-- End: Page Banner -->

    <!-- Start: Products Section -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="books-full-width">
                    <div class="container">
                        <!-- Start: Search Section -->
                        <section class="search-filters">
                            <div class="filter-box mx-auto">
                                <h3>
                                    Que recherchez-vous à la bibliothèque?</h3>
                                <form action="" method="get">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="catalog" id="catalog" class="form-control">
                                                <option selected="selected">Cherchez par Auteur</option>
                                                @foreach ($livres as $l)
                                                    <option value="{{$l->idauteur}}">{{$l->auteur['nom']}} {{$l->auteur['prenom']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="category" id="category" class="form-control">
                                                <option>Cherchez par Genre</option>
                                                @foreach ($livres as $l)
                                                    <option value="{{$l->idgenre}}">{{$l->genre['genre']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input class="form-control" type="submit" value="Recherche">
                                        </div>
                                    </div> 
                                </form>
                            </div>
                            <div class="clear"></div>
                        </section>
                        <!-- End: Search Section -->
                        
                        <div class="booksmedia-fullwidth">
                            <ul>
                                @foreach ($livres as $l)
                                <li>
                                    <figure>
                                        <a href="#"><img src="{{ asset('livres/'.$l->image) }}" alt="Book"></a>
                                        <figcaption>
                                            <header>
                                                <h4><a href="#">{{$l->titre}}</a></h4>
                                                <p><strong>Auteur :</strong> {{$l->auteur['nom']}} {{$l->auteur['prenom']}}</p>
                                                <p><strong>Genre :</strong>  {{$l->genre['genre']}}</p>
                                                <p><strong>Langue :</strong>  {{$l->langue}}</p>
                                            </header>
                                            <p>
                                                {{$l->resume}}    
                                            </p>
                                            <div class="actions">
                                                <ul>
                                                    <li>
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top">
                                                            <i class="fa fa-shopping-cart mr-2"></i>    Demander
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>                                                
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- End: Products Section -->
@endsection