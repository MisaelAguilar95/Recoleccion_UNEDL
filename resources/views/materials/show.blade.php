@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Detalle de Producto # {{ $product->id }}</h6>
          </div>
        </div>
        <div class="card-body">
            <div class="row col-md-12">
                <div class="form-group col-md-4 ">
                    <label class="form-control-label" for="input-username">Nombre:</label>
                    <input name="title"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group " value="{{ $product->title }}" readonly>
                </div>
                <div class="form-group col-md-8 ">
                    <label class="form-control-label" for="input-username">Descripción:</label>
                    <input name="description"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group" value="{{ $product->description }}" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group col-md-12 ">
                    <label class="form-control-label" for="input-username">Código del Producto:</label>
                    <input name="product_code"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group " value="{{ $product->product_code }}" readonly>
                </div>
                <div class="form-group col-md-12 ">
                  <label class="form-control-label" for="input-username">Fecha de Creación:</label>
                  <input name="product_code"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="input-group " value="{{ $product->created_at }}" readonly>
              </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <a href="{{ route('materials') }}" type="button" class="btn btn-info">
                        <span class="material-icons text-md">arrow_back</span>REGRESAR
                    </a>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection
