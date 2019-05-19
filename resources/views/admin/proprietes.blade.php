@extends('layouts.admin')
@section('content')
<div id="proprietes">
    <h2>Propriétés de {{$category->category}}: </h2>
    @if ($success = Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    @if ($danger = Session::get('danger'))
        <div class="alert alert-danger">
            {{ $danger }}
        </div>
    @endif
    @foreach($proprietes as $propriete)
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><a href="">{{$propriete->propriete}}</a></td>
                    <td>
                        <a href="{{ route('admin.delete_propriete', $propriete->id) }}" class="delete-propriete btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    <div class="col-md-10 text-center">
        <a href="{{action('AdminController@createpropriete', $category->id) }}" class="btn btn-primary btn-color">Ajouter une proprieté</a>
    </div>
</div>
@endsection