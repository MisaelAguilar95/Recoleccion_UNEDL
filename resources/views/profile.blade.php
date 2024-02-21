@extends('layouts.app')

@section('title', 'Perfil')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Perfil de Usuario</h6>
          </div>
        </div>
        <div class="card-body">
            <div class="row col-md-12">
                <div class="form-group col-md-4 input-group-outline">
                    <label class="form-control-label" for="input-username">Nombre:</label>
                    <input name="name" type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" class="input-group input-group-outline" value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="form-group col-md-4 input-group-outline">
                    <label class="form-control-label" for="input-username">Email:</label>
                    <input name="email" type="email" class="input-group input-group-outline" value="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="form-group col-md-4 input-group-outline">
                    <label class="form-control-label" for="input-username">Nivel:</label>
                    <input name="level"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" class="input-group input-group-outline" value="{{ auth()->user()->level }}" readonly>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
