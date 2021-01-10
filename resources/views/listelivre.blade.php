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
                            <div class="filter-box">
                                <h3>
                                    Que recherchez-vous à la bibliothèque?</h3>
                                <form action="" method="get">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Chercher par Titre" id="keywords" name="keywords" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <select name="catalog" id="catalog" class="form-control">
                                                <option selected="selected">Cherchez par Auteur</option>
                                                @foreach ($livres as $l)
                                                    <option value="{{$l->langue}}">{{$l->langue}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <select name="category" id="category" class="form-control">
                                                <option>Cherchez par Genre</option>
                                                @foreach ($livres as $l)
                                                    <option value="{{$l->genre['genre']}}">{{$l->genre['genre']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="submit" value="Search">
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
                                    <div class="book-list-icon red-icon"></div>
                                    <figure>
                                        <a href="books-media-detail-v2.html"><img src="{{ asset('livres/'.$l->image) }}" alt="Book"></a>
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
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add TO CART">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Share">
                                                            <i class="fa fa-share-alt"></i>
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