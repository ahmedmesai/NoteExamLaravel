@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Create Note</h1>
            <a class="btn btn-primary btn-lg" href="{{route('notes')}}">All Note</a>
        </div>
        <div class=" col">
            <form method="POST" action="{{route('note.store')}}">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title') border-danger @enderror" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control @error('title') border-danger @enderror" rows="6" placeholder="Content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save Note</button>
                </div>
            </form>
        </div>
    </div>
@endsection
