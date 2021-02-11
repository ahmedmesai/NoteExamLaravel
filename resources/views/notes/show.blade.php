@extends('layouts.app')
@php
    $i = 1;
@endphp
@section('content')
    <div class="container">
        {{-- <div class="jumbotron">
            <h1 class="display-4">All Notes</h1>
            <a class="btn btn-success btn-lg" href="{{route('notes')}}">All Notes</a>
        </div> --}}
        <div class="row col">
            <div>
                <div class="card-body">
                    <h5 class="card-title">{{$note->title}}</h5>
                    <p class="card-text">{{$note->content}}</p>
                    <p class="card-text"><strong>Created At: </strong>{{$note->created_at->diffForHumans()}}</p>
                    <p class="card-text"><strong>Updated At: </strong>{{$note->updated_at->diffForHumans()}}</p>
                    <a href="{{route('notes')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
