@extends('layouts.app')

@section('title', 'Crear Producto')

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Crear Producto</h6>
          </div>
        </div>
        <div class="card-body">
            <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group input-group-outline my-3">
                      <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                      <label class="form-label">Nombre</label>
                      <input required name="title"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Descripción</label>
                        <input required name="description"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="form-control">
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Código</label>
                        <input required name="product_code"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9, ]/, '')" class="form-control">
                        <input required name="priceXkilo"  type="number" step="0.01" min="0" max="1000" value="0.00" class="form-control" hidden>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-end">
                      <a href="{{ route('materials') }}" type="button" class="btn btn-warning">
                        CANCELAR
                     </a>
                        <button type="submit" class="btn btn-success">GUARDAR PRODUCTO</button>
                    </div>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
