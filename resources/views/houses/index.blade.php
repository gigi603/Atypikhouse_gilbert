@extends('layouts.app')
@section('title', 'Nos hébergements')
@section('meta_description', 'Venez découvrir nos locations atypique, nous possèdons un vaste choix de locations tels que des cabanes, des yourtes, des maisons sur piloti et bien dautres choses encore')
@section('content')
<div class="container-fluid" role="annonces">
    <h2 id="hebergements">Nos hébergements</h2>
    <div class="text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="input-group reservation-search">
                        <form class="form-horizontal" method="get" action="{{url('search')}}" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 cadre">
                                    <h1 class="title title-intro">Trouvez les meilleurs locations atypique, partout en Europe !</h1>
                                    <div class="form-group reservation-search">
                                        @include('search',['url'=>'search','link'=>'search'])
                                    </div>
                                </div>
                                @forelse($houses as $house)
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
                                    @empty 
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <p style="color: #000;">Désolé aucun hébérgements ne correspond à vos critères</p>
                                        </div>
                                @endforelse
                            </div>
                        </form>
                    </div>
                    
                </div>
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