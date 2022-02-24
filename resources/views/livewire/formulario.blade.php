<div>
    {{$teste}}
    <form wire:submit.prevent="save">
        ...
        <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter name" wire:model="teste">
        <button>Save</button>
    </form>
</div>
