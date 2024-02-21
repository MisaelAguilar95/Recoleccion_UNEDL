@extends('layouts.app')

@section('title', 'Materiales')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" >
            <h6 class="text-white text-capitalize ps-3">Materiales</h6>
          </div>
        </div>
        <div class="card-body col-md-12 text-end mt-3">
            <a class="btn mb-0" href="{{ route('materials.create') }}" style="background-color: rgb(216, 157, 47); color:rgb(250, 250, 250)"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar Material</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (Session::get('success'))

                    <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                        <span class="alert-icon text-center">
                          <span class="material-icons text-md">
                          thumb_up_off_alt
                          </span>
                        </span>
                        <span class="alert-text">{{ Session::get('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Código</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    @if ($product->count()>0)
                        @foreach ($product as $value)
                        <tr>
                            <td class="text-center">{{ $value->id }}</td>
                            <td class="text-center">{{ $value->title }}</td>
                            <td class="text-center">{{ $value->description }}</td>
                            <td class="text-center">{{ $value->product_code }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('materials.show', $value->id) }}" type="button" class="btn btn-info"><span class="material-icons text-md">
                                        visibility
                                        </span>&nbsp;Detalle</a>
                                    <a href="{{ route('materials.edit', $value->id) }}" type="button" class="btn btn-warning"><span class="material-icons text-md">
                                        edit_note
                                        </span>&nbsp;Editar</a>
                                    <form action="{{ route('materials.destroy', $value->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Desea Eliminar registro # {{ $value->id }} ')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0"><span class="material-icons text-md">
                                            delete
                                            </span>&nbsp;Borrar</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td>No se Encontró Ningún Producto</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
