@extends('layouts.app')

@section('title', 'Editar el Producto')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Editar Producto # {{ $product->id }}</h6>
          </div>
        </div>
        <div class="card-body">
            <form action="{{ route('materials.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row col-md-12">
                <div class="form-group col-md-4 ">
                    <label class="form-control-label" for="input-username">Nombre:</label>
                    <input hidden type="text" name="modify_user_id" value="{{ auth()->user()->id }}">
                    <input name="title"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group " value="{{ $product->title }}" >
                </div>
                <div class="form-group col-md-8 ">
                    <label class="form-control-label" for="input-username">Descripción:</label>
                    <input name="description"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group" value="{{ $product->description }}" >
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group col-md-4 ">
                    <label class="form-control-label" for="input-username">Código del Producto:</label>
                    <input name="product_code"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group " value="{{ $product->product_code }}" >
                </div>
                <div class="form-group col-md-4 ">
                  <label class="form-control-label" for="input-username">Fecha de Creación:</label>
                  <input name="createe_at"  type="text" class="input-group " value="{{ $product->created_at }}" readonly>
              </div>
            </div>
            <hr style="background-color:black">
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="{{ route('materials') }}" type="button" class="btn btn-info">
                        <span class="material-icons text-md">arrow_back</span>REGRESAR
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-success">
                        <span class="material-icons text-md">save</span>ACTUALIZAR
                    </button>
                </div>
            </div>
       </form>
        </div>
      </div>
    </div>
  </div>
@endsection
