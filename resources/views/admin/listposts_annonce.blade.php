@extends('layouts.admin')
@section('title', "Messages des clients")
@section('content')
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
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Annonces</div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Annonceur</th>
                    <th> Actions</th>
                </tr>
                </thead>
                @foreach($posts as $post)
                    @if($post["unread"] == true)
                        <tbody style="background-color:green">
                            <tr>
                                <td>{{$post->name}}</td>
                                <td><a href="{{route('admin.showmessages_annonce', $post->id)}}" class="btn btn-primary">Voir la notification</a></td>
                            </tr>
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td>{{$post->name}}</td>
                                <td><a href="{{route('admin.showmessages_annonce', $post->id)}}" class="btn btn-primary">Voir la notification</a></td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection