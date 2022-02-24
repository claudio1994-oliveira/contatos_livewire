<div>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                    <tr>
                        <td>{{$contato->nome}}</td>
                        <td>{{$contato->email}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
