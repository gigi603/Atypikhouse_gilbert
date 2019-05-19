@extends('layouts.app')
@section('title', 'Nos Hébergements')
@section('meta_description', 'Venez découvrir nos locations atypique, nous possèdons un vaste choix de loccation tels que des cabanes, des yourtes, des maisons sur piloti et bien dautres choses encore')
{{-- @section('footer', 'footer_absolute') --}}
@section('content')
<div class="container-fluid" role="annonces">
    <h2 id="hebergements">Nos hébergements</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="input-group">
                <span class="input-group-btn">
                    <form class="form-horizontal" method="get" action="{{url('search')}}" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 30px;">
                                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-3 col-sm-9 col-sm-offset-1">
                                    <div class="form-group button2">
                                        @include('search',['url'=>'search','link'=>'search'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($houses as $house)
            @if($house->statut == "Validé")
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card-houses h-100">       
                        <a href="{{action('UsersController@showHouse', $house['id'])}}"><img class="img-responsive" src="{{ asset('img/houses/'.$house->photo) }}" alt="Hébergement insolite - {{$house->title}}"></a>
                        <div class="card-block">
                            <div class="card-body">
                                <h3 class="card-title"><a href="{{action('UsersController@showHouse', $house->id)}}"> <?php echo(substr($house->title, 0, 30));?> </a><br> - {{$house->ville}} </h3> 
                            </div>
                            <p class="price"> {{$house->price}}€ / nuit</p>
                        </div>
                    </div>
                </div>
            @endif  
        @endforeach
    </div>
</div>