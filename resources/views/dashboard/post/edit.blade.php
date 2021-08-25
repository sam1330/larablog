@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')
<form action="{{ route('post.update', $post->id) }}" method="POST">
@method('PUT')
@include('dashboard.post._form')
</form>
<br>
<form action="{{ route('post.image', $post) }}" enctype="multipart/form-data" method="POST">
@csrf
<div class="row">
  <div class="col">
    <input type="file" name="image" class="form-control">
  </div>
  <div class="col">
    <input type="submit" value="Subir" class="btn btn-primary">
  </div>
</div>
</form>

@endsection