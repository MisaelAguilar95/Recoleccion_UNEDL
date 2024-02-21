@extends('layouts.app')

@section('title', 'Recolección')

@section('contents')

<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" >
            <h6 class="text-white text-capitalize ps-3">Separaciones Pendientes Recolectar</h6>
          </div>
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
                            <th class="text-center">material</th>
                            <th class="text-center">Peso</th>
                            <th class="text-center">Merma</th>
                            <th class="text-center">Pago</th>
                            <th class="text-center">Plantel</th>
                            <th class="text-center">Fecha</th>
                        </tr>
                    </thead>
                    @if ($separations->count()>0)
                        @foreach ($separations as $separation)
                        @if($separation->status =='paid')
                            <tr>
                                <td class="text-center">{{ $separation->id }}</td>
                                <td class="text-center">{{ $separation->product->title}}</td>
                                <td class="text-center">{{ $separation->weight }}</td>
                                <td class="text-center">{{ $separation->merma }}</td>
                                <td class="text-center">$ {{ $separation->payment }}</td>
                                <td class="text-center">{{ $separation->plantel }}</td>
                                <td class="text-center">{{ $separation->created_at }}</td>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
    })
    
    </script>