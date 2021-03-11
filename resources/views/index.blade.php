
<div class="row text-center">
    <h3>Lista de lembretes</h3>
    <a class="btn btn-success" href="{{ route('lembrete.create') }}">Cadastrar Lembrete</a>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Data</th>
        <th scope="col">Hora</th>
        <th scope="col">Repeticao</th>
        <th scope="col">Status</th>
        <th scope="col">Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach($registers as $item)
        <tr>
            <th scope="row">{{ $item->id  }}</th>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->data }}</td>
            <td>{{ $item->hora }}</td>
            <td>{{ $item->repeticao }}</td>
            <td>
                @if($item->status == 1)
                    <span class="alert-success">Ativado</span>
                @else
                    <span class="alert-danger">Desativado</span>
                @endif
            </td>
            <td>
                <div class="row">
                    <a href="{{ route('lembrete.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('lembrete.destroy', $item->id) }}" class="btn btn-danger">Excluir</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


{{ $registers->links() }}


<script>
  window.setInterval(function() {
    $.ajax({
      type: "GET",
      data: '',
      url: "/email",
      datatype: "json",
      success: function(data) {
        console.log(data)
      }
    });
  }, 60000);

  window.setInterval(function() {
    $.ajax({
      type: "GET",
      data: '',
      url: "/email/hora",
      datatype: "json",
      success: function(data) {
        console.log(data)
      }
    });
  }, 3600000);
</script>
