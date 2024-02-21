<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title style="color:rgb(230, 144, 45)">Tienes Una Alerta Para Recolectar en UNEDL</title>
</head>
<body>
    <p>UNEDL Te Ha Enviado Una Alerta de Recolección</p>
    <ul>
        <li>Ingresa a la plataforma para Revisar la información Completa </li>
    </ul>
    <p>Pasa a recolectar Lo antes posible</p>
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
                <th class="text-center">Fecha</th>
            </tr>
        </thead>
        @if ($data->count()>0)
            @foreach ($data as $value)
            @if($value->status =='validated')
                <tr>
                    <td class="text-center">{{ $value->id }}</td>
                    <td class="text-center">{{ $value->user->name }}</td>
                    <td class="text-center">{{ $value->product->title}}</td>
                    <td class="text-center">{{ $value->weight }}</td>
                    <td class="text-center">{{ $value->num_bags }}</td>
                    <td class="text-center">{{ $value->m3}}</td>
                    <td class="text-center">{{ $value->plantel }}</td>
                    <td class="text-center">{{ $value->created_at }}</td>
                </tr>
            @endif
            @endforeach
        @else
        <tr>
            <td>No se Encontró Ningún Producto</td>
        </tr>
        @endif
    </table>
</body>
</html>