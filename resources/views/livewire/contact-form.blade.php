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
        <div class="card p-4" >
            <form  wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="nome">Nome</label>
                            <input class="form-control" value="" id="nome" type="text" wire:model="name">
                            @error('name')
                                <span class="error"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="email">E-mail</label>
                            <input class="form-control" value="" type="text" id="email" wire:model="email">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="nome">Telefone</label>
                            <input class="form-control" value="" id="telefone" type="text" wire:model="telefone">
                            @error('name')
                                <span class="error"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="instagram">Instagram</label>
                            <input class="form-control" value="" type="text" id="instagram" wire:model="instagram">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="facebook">Facebook</label>
                            <input class="form-control" value="" type="text" id="instagram" wire:model="facebook">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="twitter">Twitter</label>
                            <input class="form-control" value="" type="text" id="twitter" wire:model="twitter">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary mb-3" type="submit">Salve o contato</button>
            </form>
        </div>


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
                        <tr class="">
                            @if ($contato->photo_path)
                                <td class="col-5">
                                    <img src="{{ url("storage/{$contato->photo_path}") }}"
                                        alt="{{ $contato->name }}" class="img-fluid img-thumbnail">
                                    {{ $contato->nome }}
                                </td>
                            @else
                                <td class="col-5">
                                    <img src="{{ url('imgs/sem-foto.png') }}" alt="{{ $contato->name }}"
                                        class="img-fluid img-thumbnail rounded ">
                                    {{ $contato->nome }}
                                </td>
                            @endif

                            <td class="col-4">{{ $contato->email }}</td>
                            <td class="col-3">
                                <div class="d-flex justify-content-between">
                                    <form class="d-flex justify-content-start"
                                        wire:submit.prevent="storagePhoto({{ $contato->id }})">
                                        <input class="form-control form-control-sm me-3" type="file" id="formFile"
                                            wire:model="photo">
                                        <button class="btn btn-primary"><i class="fa-solid fa-image"></i></button>
                                    </form>

                                    <a href="#" class="btn btn-danger"
                                        onclick="return confirm('Ao confirmar o contato será apagado permanentemente.') || event.stopImmediatePropagation()"
                                        wire:click.prevent="destroy({{ $contato->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
