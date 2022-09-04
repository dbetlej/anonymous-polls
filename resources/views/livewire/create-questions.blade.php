<form wire:submit.prevent="store">

    <button class="btn btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
    <br>

    <input type="text" name="name" id="name" wire:model.defer="name.0" placeholder="Question name">
    @error('name.0') <span class="error">{{ $message }}</span> @enderror
    <input type="text" name="correct_answer" id="correct_answer" wire:model.defer="correct_answer.0" placeholder="Correct answer">
    @error('correct_answer.0') <span class="error">{{ $message }}</span> @enderror
    <br>

    @foreach($inputs as $key => $value)
        <div class=" add-input">
            <input type="text" name="name" id="name" wire:model.defer="name.{{ $value }}" placeholder="Question name">
            @error('name.{{ $value }}') <span class="error">{{ $message }}</span> @enderror
            <input type="text" name="correct_answer" id="correct_answer" wire:model.defer="correct_answer.{{ $value }}" placeholder="Correct answer">
            @error('correct_answer.{{ $value }}') <span class="error">{{ $message }}</span> @enderror
            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
            <br>
        </div>
    @endforeach

    <button type="submit">Save Questions</button>
    @if (session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</form>
