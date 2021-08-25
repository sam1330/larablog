@extends('dashboard.master')

@section('content')

  @csrf
  <div class="form-group">
    <label for="title">Titulo</label>
    <input readonly class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
    
    @error('title')
      <small class="text-danger"> {{ $message }} </small>
    @enderror
  </div>
  <div class="form-group">
    <label for="url_clean">Url Limpia</label>
    <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ old('url_clean') }}">
  </div>
  <div class="form-group">
    <label for="content">Contenido</label>
    <textarea readonly name="content" class="form-control" id="content" cols="30" rows="5">{{ $post->content }}</textarea>
  </div>


@endsection