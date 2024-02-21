@extends('layouts.app')

@section('title', 'Lista de Precios Materiales')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" >
            <h6 class="text-white text-capitalize ps-3">Lista de Precios Materiales</h6>
          </div>
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
                            <th class="text-center">Precio</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    @if ($product->count()>0)
                        @foreach ($product as $value)
                        <tr>
                            <td class="text-center">{{ $value->id }}</td>
                            <td class="text-center">{{ $value->title }}</td>
                            <td class="text-center">$ {{ $value->priceXkilo }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('materials.pricelistEdit', $value->id) }}" type="button" class="btn btn-warning"><span class="material-icons text-md">
                                        edit_note
                                    </span>&nbsp;Editar</a>
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
