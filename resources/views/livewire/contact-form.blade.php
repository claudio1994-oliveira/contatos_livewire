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
                            @error('telefone')
                                <span class="error"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="instagram">Instagram</label>
                            <input class="form-control" value="" type="text" id="instagram" wire:model="instagram">
                            @error('instagram')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="facebook">Facebook</label>
                            <input class="form-control" value="" type="text" id="instagram" wire:model="facebook">
                            @error('facebook')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="twitter">Twitter</label>
                            <input class="form-control" value="" type="text" id="twitter" wire:model="twitter">
                            @error('twitter')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary mb-3" type="submit">Salve o contato</button>
            </form>
        </div>
    </div>
</div>
