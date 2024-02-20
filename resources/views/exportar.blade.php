<table class="striped">
    <thead>
      <tr>
          <th>Numero de Serie</th>
          <th>Folio</th>
          <th>Cargador</th>
          <th>Colaborador</th>
          <th>Propiedad</th>
          <th>Descripción</th>
      </tr>
    </thead>
    <tbody>
        @foreach($computo as $comput)
            <tr>
                <td><a href="/computo/{{$comput->id}}">{{$comput->serie}}</a></td>
                <td>{{$comput->folio}}</td>
                <td>{{$comput->cargador}}</td>
                <td>{{$comput->colaborador->nombres}}</td>
                <td>{{$comput->tipo}}</td>
                <td>{{$comput->descripcion}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
