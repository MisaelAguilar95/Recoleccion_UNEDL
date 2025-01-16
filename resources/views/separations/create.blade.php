@extends('layouts.app')

@section('title', 'Crear Separación')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('contents')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Crear Separación</h6>
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
            <form action="{{ route('separations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                          <label class="form-label">Usuario: </label>
                          <input hidden class="form-control-input" name="user_id" id="user_id" value="   {{ auth()->user()->id }}" readonly/>
                          <input class="form-control-input" name="user_name" id="user_id" value="   {{ auth()->user()->name }}" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class=" input-group-outline ">
                        <label class="form-label">Tipo: </label>
                        <select class="form-select" name="product_id" id="product_id" required>
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
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Peso en Kilos</label>
                        <input name="weight" type="number" step="0.01" min="0" max="1000"class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-outline my-3">
                          <label class="form-label">Número de Bolsas</label>
                          <input required name="num_bags"  type="number" step="0.01" min="0" max="1000" class="form-control">
                          <input name="status" type="text" class="form-control" value="not validated" hidden>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Metros Cúbicos</label>
                        <input name="m3"  type="number" step="0.01" min="0" max="1000" class="form-control">
                      </div>
                    </div>     
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="my-3">
                            <label class="form-label">Comentarios: </label>
                          <textarea class="form-control-input" name="notes" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center" id="img" style="display:none">
                        <img id="img_separation" name="img_separation" src="#" alt="Imagen" style="width: 180px" required />
                    </div>
                    <div class="col-md-6 text-center">
                        <button class="btn btn-primary"><input class="form-control" name="img" accept="image/png, image/jpeg" type='file' id="imgInp" required /> <br></button>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-success">GUARDAR SEPARACIÓN</button>
                    </div>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
$(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            document.getElementById("img").style.display="block";
            var reader = new FileReader(); //Leemos el contenido
            reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
            $('#img_separation').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        console.log('input') //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
        readURL(this)
    })
})

</script>

