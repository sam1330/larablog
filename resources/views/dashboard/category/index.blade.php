@extends('dashboard.master')

@section('content')

<a href="{{ route('category.create') }}" class="btn btn-primary my-3">Crear</a>
<table class="table">
  <thead>
    <tr>
      <td>ID</td>
      <td>Titulo</td>
      <td>Fecha de creacion</td>
      <td>Fecha de actualizacion</td>
      <td>Acciones</td>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td>{{$category->id}}</td>
      <td>{{$category->title}}</td>
      <td>{{$category->created_at->format('d-M-Y')}}</td>
      <td>{{$category->updated_at->format('d-M-Y')}}</td>
      <td>
        <a href="{{ route('category.show', $category->id) }}" class="btn btn-success">Mostrar</a>
        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Actualizar</a>
        <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->id }}" class="btn btn-danger">Eliminar</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


{{$categories->links()}}
@endsection

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>¿Seguro que desea eliminar category?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<script>
  window.onload = function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        console.log('modal abierto')
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })
  };
</script>