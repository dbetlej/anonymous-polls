<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class EditPolls extends Component
{
    public $poll;
    public $name;
    public $slug;
    public $status = true;

    protected $rules = [
        'name' => ['nullable', 'string'],
        'status' => ['required', 'boolean'],
        'slug' => ['required', 'filled'],
    ];

    public function render()
    {
        return view('livewire.create-polls');
    }

    public function mount(Poll $poll)
    {
        $this->name = $poll->name;
        $this->slug = $poll->slug;
        $this->status = $poll->status == Poll::PUBLISHED;
    }

    public function savePoll()
    {
        $validated = $this->validate();

        $validated['status'] = Poll::NOT_PUBLISHED;
        if($this->status) {
            $validated['status'] = Poll::PUBLISHED;
            $validated['published_at'] = now();
        }

        $this->poll->update($validated);

        session()->flash('message', 'Poll successfully updated.');
    }
}
