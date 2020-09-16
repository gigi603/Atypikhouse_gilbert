@extends('layouts.app')
@section('title', 'Nos hébergements')
@section('meta_description', "Atypikhouse contient des espaces atypiques un peu partout en europe notamment en france à grenoble, seine et marne")
@section('content')
<div class="container-fluid block-container" role="annonces">
    <h1 class="h1-title" id="hebergements">Nos espaces atypiques</h1>
    <div class="text-center">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-lg-12 col-md-12 col-sm-12"> --}}
                    <div class="input-group reservation-search">
                        <form class="form-horizontal" method="get" action="{{url('search')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- <div class="row"> --}}
                                <div class="col-lg-3 col-md-3 col-sm-12 cadre">
                                    <h2 class="h2-title">Atypikhouse offre les meilleurs espaces atypiques en Europe !</h2>
                                    <div class="form-group reservation-search">
                                        @include('search',['url'=>'search','link'=>'search'])
                                    </div>
                                </div> 
                                @forelse($houses as $house)
                                    @if($house->statut == "Validé")
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="card-houses h-100">       
                                                <a href="{{action('UsersController@showHouse', $house['id'])}}"><img class="img-houses-list" src="{{ asset('img/houses/'.$house->photo) }}" alt="Hébergement insolite - {{$house->title}}"></a>
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <h3 class="card-title title-houses"><a href="{{action('UsersController@showHouse', $house->id)}}"> {{$house->title}} </a><br> {{$house->adresse}}<br></h3> 
                                                    </div>
                                                    <p class="price"> {{$house->price}}€ / nuit</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif 
                                        @empty 
                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <p style="color: #000;">Désolé aucunes annonces ne correspondent à vos critères</p>
                                            </div>
                                    @endforelse
                                </div>
                            {{-- </div> --}}
                        </form>
                    </div>
                    
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection