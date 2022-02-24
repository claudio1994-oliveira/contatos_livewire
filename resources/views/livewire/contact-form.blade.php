<div>
    <div class="container">
        <div class="row mb-3 mt-3">
            <h2> Contatos </h2>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show pt-4" role="alert">
                <strong> 
                    <i class="fa-solid fa-circle-check"></i>
                    {{ $message }}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div>
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif
            </div>

        @endif

        <form class="form-row" wire:submit.prevent="submit">
            <div class="mb-3">
                <label for="nome">Nome</label>
                <input class="form-control" value={{ $name }} id="nome" type="text" wire:model="name">
                @error('name')
                    <span class="error"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">E-mail</label>
                <input class="form-control" value={{ $email }}type="text" id="email" wire:model="email">
                @error('email')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Salve o contato</button>
        </form>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col"><i class="fa-solid fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contatos as $contato)
                        <tr>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>
                                <a href="#" class="btn btn-danger" 
                                onclick="return confirm('Ao confirmar o contato será apagado permanentemente.') || event.stopImmediatePropagation()"
                                wire:click.prevent="destroy({{$contato->id}})">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
