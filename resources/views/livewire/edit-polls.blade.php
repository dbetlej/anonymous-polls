<div>
    <h2>Poll Questions</h2>
    <h7>Reorder / edit or delete question</h7>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Correct answer</th>
            <th>Position</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody wire:sortable="updateQuestionOrder">
        @foreach($questions as $question)
            <tr wire:sortable.item="{{ $question->id }}" wire:key="question-{{ $question->id }}" wire:sortable.handle>
                <td>{{ $question->id }}</td>
                <td>{{ $question->name }}</td>
                <td>{{ $question->correct_answer }}</td>
                <td>{{ $question->order }}</td>
                <td><a href="{{ route('questions.edit', $question) }}">Edit</a></td>
                <td><button wire:click="removeQuestion({{ $question->id }})">Remove</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <h2>Poll Form</h2>
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
</div>
