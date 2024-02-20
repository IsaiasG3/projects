<table class="striped">
    <thead>
      <tr>
          <th>Modelo</th>
          <th>Marca</th>
          <th>IMCI</th>
          <th>Serie</th>
          <th>SIM</th>
          <th>Tel Cerebrit0</th>
          <th>Colaborador</th>
      </tr>
    </thead>
    <tbody>
        @foreach($telefonia as $telef)
            <tr>
                <td>{{$telef->modelo}}</td>
                <td>{{$telef->marca}}</td>
                <td>{{$telef->imci}}</td>
                <td><a href="/telef/{{$telef->id}}">{{$telef->serie}}</a></td>
                <td>{{$telef->sim}}</td>
                <td>{{$telef->tel_cerebrit0}}</td>
                <td>{{$telef->colaborador->nombres}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
