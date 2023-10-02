<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form class="container" wire:submit.prevent="store">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" wire:model.debounce.1500ms="title">
            @error('title')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo</label>
            <input type="text" class="form-control" id="subtitle" wire:model.debounce.1500ms="subtitle">
            @error('subtitle')
                <span class="error text-danger">{{ $message }}</span>
            @enderror

        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Corpo</label>
            <textarea class="form-control" wire:model.debounce.1500ms="body"></textarea>
            @error('body')
                <span class="error text-danger">{{ $message }}</span>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary" wire:click="store">Salva</button>
    </form>
</div>
