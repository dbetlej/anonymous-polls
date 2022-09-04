<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use App\Models\Question;
use Livewire\Component;

class EditPolls extends Component
{
    public $poll, $name, $slug, $questions;
    public $status = true;

    protected $rules = [
        'name' => ['nullable', 'string'],
        'status' => ['required', 'boolean'],
        'slug' => ['required', 'filled'],
    ];

    public function render()
    {
        return view('livewire.edit-polls');
    }

    public function mount(Poll $poll)
    {
        $this->name = $poll->name;
        $this->slug = $poll->slug;
        $this->status = $poll->status == Poll::PUBLISHED;
        $this->questions = $poll->questions()->orderBy('order')->get();
    }

    public function savePoll()
    {
        $validated = $this->validate();

        $validated['status'] = Poll::NOT_PUBLISHED;
        if($this->status) {
            $validated['status'] = Poll::PUBLISHED;
            $validated['published_at'] = now();
        }

        if(empty($validated['name'])) {
            $validated['name'] = 'Poll: ' . $this->poll->id;
        }

        $this->poll->update($validated);

        session()->flash('message', 'Poll successfully updated.');
    }

    public function updateQuestionOrder($items)
    {
        foreach ($items as $item) {
            $this->poll->questions->find($item['value'])->update(['order' => $item['order']]);
        }

        $this->questions = $this->poll->questions()->orderBy('order')->get();
        $this->dispatchBrowserEvent('updated', ['message' => 'Questions order updated']);
    }

    public function removeQuestion($item)
    {
        $this->poll->questions->contains($item) ? Question::find($item)->delete() : abort(404);

        $this->questions = $this->poll->questions()->orderBy('order')->get();
        $this->dispatchBrowserEvent('updated', ['message' => 'Questions order updated']);
    }
}
