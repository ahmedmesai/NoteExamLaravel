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
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Action</th>
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
                            <a class="btn btn-success" href="{{route('note.show', ['id' => $item->id])}}">Show Note</a>
                            <a class="btn btn-warning" href="{{route('note.edit', ['id' => $item->id])}}">Edit Note</a>
                            <a class="btn btn-danger" href="{{route('note.destroy', ['id' => $item->id])}}">Delete Note</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
