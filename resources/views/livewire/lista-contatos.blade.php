<div>
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
<div class="d-flex justify-content-center">
  {{ $contatos->links() }}
</div>

</div>
