<form wire:submit.prevent="savePoll">

    <input type="text" name="name" id="name" wire:model.defer="name">
    @error('name') <span class="error">{{ $message }}</span> @enderror

    <input type="text" name="slug" id="slug" wire:model.defer="slug">
    @error('slug') <span class="error">{{ $message }}</span> @enderror

    <input type="radio" id="published" name="status" wire:model.defer="status" value="1">
    <label for="published">Published</label>
    <input type="radio" id="not_published" name="status" wire:model.defer="status" value="0">
    <label for="not_published">Not published</label>
    @error('status') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Save Poll</button>
    @if (session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</form>
