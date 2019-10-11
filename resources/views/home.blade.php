@extends('layouts.app')
@section('title', 'Accueil')
@section('meta_description', "Découvrez nos locations atypiques, nous possèdons un vaste choix d'hébergements tels que des cabanes, igloos, yourtes, des maisons sur piloti et bien dautres choses encore")
@section('content')
    <div class="container-fluid banner">
        <div class="intro-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group reservation-search">
                            <form class="form-horizontal" method="get" action="{{url('search')}}" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 cadre">
                                        <h1 class="title title-intro">Trouvez les meilleurs locations atypique, partout en Europe !</h1>
                                        <div class="form-group reservation-search">
                                            @include('search',['url'=>'search','link'=>'search'])
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="block_home_2" role="avantages">
        <div id="tranquilite" class="block_home_2_child">
            <i class="fas fa-procedures fa-5x"></i>
            <h2>Tranquilité</h2>
            <p>Rester au calme pendant votre séjour dans nos habitats insolite. Nos cabanes et yourtes sauront combler vos désirs les plus variés</p>
        </div>
        <div id="depaysement" class="block_home_2_child">
            <i class="fab fa-angellist fa-5x"></i>
            <h2>Dépaysement</h2>
            <p>Sortez de la routine quotidienne et venez vivre des expérience unique dans des décors à couper le souffle</p>
        </div>
        <div id="money" class="block_home_2_child">
            <i class="far fa-money-bill-alt fa-5x"></i>
            <h2>Economie</h2>
            <p>Profitez de promotions toute l'année sur de nombreuses locations atypique tels que les cabanes, les cocons pour amoureux et bien d'autres. </p>
        </div>
    </div>
    <div class="container-fluid" role="annonces">
        <h2 id="hebergements">Nos hébergements</h2>
        <div class="row">
            @foreach($houses as $house)
                @if($house->statut == "Validé")
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                        <div class="card-houses h-100">       
                            <a href="{{action('UsersController@showHouse', $house['id'])}}"><img class="img-responsive" src="{{ asset('img/houses/'.$house->photo) }}" alt="Hébergement insolite - {{$house->title}}"></a>
                            <div class="card-block">
                                <div class="card-body">
                                    <h3 class="card-title"><a href="{{action('UsersController@showHouse', $house->id)}}"> <?php echo(substr($house->title, 0, 30));?> </a></h3>
                                </div>
                                <p class="price"> {{$house->price}}€ / nuit</p>
                            </div>
                        </div>
                    </div>
                @endif  
            @endforeach
        </div>
    </div>
    @section('script')
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/calendarHome.js') }}"></script>
    @endsection
@endsection
