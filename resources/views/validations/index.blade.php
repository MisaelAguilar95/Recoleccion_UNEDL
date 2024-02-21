@extends('layouts.app')

@section('title', 'Validar Separación')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" >
            <h6 class="text-white text-capitalize ps-3">Separaciones Pendientes de Validar</h6>
          </div>
        </div>
        <div class="card-body col-md-12 mt-3">
            {{-- texto antes de la tabla --}}
        </div>
        <div class="card-body">
            <div class="table-responsive"   style="width:100% ; font-size:80% ">
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
                            <th class="text-center">id</th>
                            <th class="text-center">usuario</th>
                            <th class="text-center">material</th>
                            <th class="text-center">Peso</th>
                            <th class="text-center">#Bolsas</th>
                            <th class="text-center">MtsCúbicos</th>
                            <th class="text-center">Plantel</th>
                            <th class="text-center">Img</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    @if ($separations->count()>0)
                        @foreach ($separations as $value)
                        @if($value->status =='not validated')
                            <tr>
                                <td class="text-center">{{ $value->id }}</td>
                                <td class="text-center">{{ $value->user->name }}</td>
                                <td class="text-center">{{ $value->product->title}}</td>
                                <td class="text-center">{{ $value->weight }}</td>
                                <td class="text-center">{{ $value->num_bags }}</td>
                                <td class="text-center">{{ $value->m3}}</td>
                                <td class="text-center">{{ $value->plantel }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('uploads/separation/'.$value->img) }}" alt="Imagen" width="70px" height="70px">
                                </td>
                                <td class="text-center">{{ $value->created_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('validations.validated', $value->id) }}" type="button" class="btn btn-success"><span class="material-icons text-md">
                                            check
                                            </span></a>
                                        <a href="{{ route('separations.edit', $value->id) }}" type="button" class="btn btn-warning"><span class="material-icons text-md">
                                            edit_note
                                            </span></a>
                                        <form action="{{ route('separations.destroy', $value->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Desea Eliminar registro # {{ $value->id }} ')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-0"><span class="material-icons text-md">
                                                delete
                                                </span></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endif
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
