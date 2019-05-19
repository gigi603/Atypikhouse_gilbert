@extends('layouts.admin')
@section('content')
<div id="categories">
    <h2>Messages : </h2>
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
    @foreach($posts as $post)
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><a href="{{action('AdminController@showposts', $post['id'])}}">{{$post->name}}</a></td>
                    <td>
                        <a href="{{action('AdminController@showposts', $post['id'])}}" class="btn btn-color"> Voir</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection