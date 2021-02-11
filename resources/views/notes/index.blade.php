@extends('layouts.app')
@php
    $i = 1;
@endphp
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">All Notes</h1>
            <a class="btn btn-success btn-lg" href="{{route('note.create')}}">Create Note</a>
        </div>
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
            @endif
        </div>
        <div class="row">
            @if ($notes->count() > 0)
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 20%">Title</th>
                        <th style="width: 50%">Content</th>
                        <th style="width: 13%">Created At</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('note.show', ['id' => $item->id])}}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-warning" href="{{route('note.edit', ['id' => $item->id])}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{route('note.destroy', ['id' => $item->id])}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning" role="alert">
                Sorry you do not have any notes !!
            </div>
            @endif

        </div>
    </div>
@endsection
