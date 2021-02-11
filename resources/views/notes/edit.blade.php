@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Edit Note</h1>
            <a class="btn btn-primary btn-lg" href="{{route('notes')}}">All Note</a>
        </div>
        <div class=" col">
            <form method="POST" action="{{route('note.update', $note->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid  @enderror" placeholder="Title" name="title" value="{{$note->title}}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control @error('content')  is-invalid  @enderror" rows="6" placeholder="Content" name="content">{!! $note->content !!}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Note</button>
                </div>
            </form>
        </div>
    </div>
@endsection
