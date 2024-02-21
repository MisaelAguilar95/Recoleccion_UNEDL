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
        @if ($separations->count()>0)
        <div class="card-body col-md-12 text-end mt-3">             
            <a class="btn btn-success mb-0" href="{{ route('collections.mail') }}" ><i class="material-icons text-sm">mail</i>&nbsp;&nbsp;Enviar Alerta a Recolector</a>
        </div>
        @endif
    
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
                            <th class="text-center">img</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    @if ($separations->count()>0)
                        @foreach ($separations as $value)
                       
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
                                        <button data-toggle="modal"data-target="#collectModal{{ $value->id }}" type="button" class="btn btn-success"><span class="material-icons text-md">
                                            check
                                            </span></button>
                                    <!-- Collect Modal-->
                                        <div class="modal fade" id="collectModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #122D7B; color: white">
                                                    <p class="lead">Recolectar Separación</p>
                                                  
                                                </div>
                                                <div class="modal-body" id="mediumBody">
                                                    <div>
                                                        <form action="{{ route('collections.collect', $value->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class=" input-group-outline ">
                                                                    <input id="separation_id" name="separation_id" value="{{ $value->id }}" type="text" hidden >
                                                                      <label class="form-label">Recolectado Por: </label>
                                                                      <select class="form-select" name="collected_by" id="collected_by" required>
                                                                        @foreach ($users as $user)
                                                                        <option value="{{ $user->name }}"  class="form-control">&nbsp;&nbsp;&nbsp;{{ $user->name }}</option>
                                                                        @endforeach
                                                                      </select>
                                                                    </div>
                                                                  </div>
                                                                <div class="col-md-12">
                                                                  <div class="input-group input-group-outline my-3">
                                                                      <label class="form-label">Notas </label>
                                                                      <input  name="notes"  type="text" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" class="form-control">
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
                                                                    <button type="submit" class="btn btn-success">Recolectar</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                          </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        {{-- <a href="{{ route('collections.edit', $value->id) }}" type="button" class="btn btn-warning"><span class="material-icons text-md">
                                            edit_note
                                        </span></a> --}}
                                        <form action="{{ route('collections.destroy', $value->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Desea Eliminar registro # {{ $value->id }} ')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-0"><span class="material-icons text-md">
                                                delete
                                                </span></button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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