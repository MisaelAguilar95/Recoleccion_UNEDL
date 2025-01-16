@extends('layouts.app')

@section('title', 'Editar Separación')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Editar Separación</h6>
          </div>
        </div>
        <div class="card-body">
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
            <form action="{{ route('separations.update', $separation->id) }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Usuario: </label>
                          <input hidden class="form-control-input" name="user_id" id="user_id" value="{{ $separation->user_id }}" />
                          <input hidden class="form-control-input" name="modify_user_id" id="modify_user_id" value="{{ auth()->user()->id }}" />
                          <input class="form-control-input" name="user_name"  value="   {{ $separation->user->name }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class=" input-group-outline ">
                        <label class="form-label">Tipo: </label>
                        <select class="form-select" name="product_id" id="product_id" required>
                        <option value="{{ $separation->product_id }}"  class="form-control">&nbsp;&nbsp;&nbsp;{{ $separation->product->title }}</option>
                          @foreach ($materials as $material)
                          <option value="{{ $material->id }}"  class="form-control">&nbsp;&nbsp;&nbsp;{{ $material->title }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class=" input-group-outline ">
                        <label class="form-label">Seleccione el plantel: </label>
                        <select class="form-select" name="plantel" id="plantel" required>
                          <option value="{{ $separation->plantel }}"  class="form-control">&nbsp;&nbsp;&nbsp;{{ $separation->plantel }}</option>
                          <option value="EDL 90"  class="form-control">EDL 90</option>
                          <option value="EDL 324"  class="form-control">EDL 324</option>
                          <option value="EDL 404"  class="form-control">EDL 404</option>
                          <option value="CASA IVEDL"  class="form-control">CASA IVEDL</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="mt-3">
                        <label class="form-label">Peso en Kilos</label>
                        <input name="weight"  type="number" step="0.01" min="0" max="1000" style="padding-left:12px" class="form-control-input" value="{{ $separation->weight }}" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mt-3">
                          <label class="form-label">Número de Bolsas</label>
                          <input required name="num_bags"  type="number" step="0.01" min="0" max="1000" style="padding-left:12px" value="{{ $separation->num_bags }}" class="form-control-input">
                          <input name="status" type="text"  class="form-control-input" value="{{ $separation->status }}" hidden>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mt-3">
                        <label class="form-label">Metros cúbicos</label>
                        <input required name="m3"  type="number" step="0.01" min="0" max="1000" style="padding-left:12px" value="{{ $separation->m3 }}" class="form-control-input">
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="my-3">
                            <label class="form-label">Comentarios: </label>
                          <textarea class="form-control-input" name="notes" id="" cols="30" rows="3">  {{ $separation->notes }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center" id="img">
                        <img id="img_separation" name="img_separation" src="{{ asset('uploads/separation/'.$separation->img) }}" alt="Imagen" style="width: 180px" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-end">
                      <a href="{{ route('validations') }}" type="button" class="btn btn-warning">
                        CANCELAR
                     </a>
                        <button type="submit" class="btn btn-success">ACTUALIZAR SEPARACIÓN</button>
                    </div>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection


