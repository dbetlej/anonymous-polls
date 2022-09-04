<form wire:submit.prevent="update">

    <input type="text" name="name" id="name" wire:model.defer="name" placeholder="Question name">
    @error('name') <span class="error">{{ $message }}</span> @enderror
    <input type="text" name="correct_answer" id="correct_answer" wire:model.defer="correct_answer" placeholder="Correct answer">
    @error('correct_answer') <span class="error">{{ $message }}</span> @enderror
    <br>

    <button type="submit">Save Question</button>
    @if (session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</form>
