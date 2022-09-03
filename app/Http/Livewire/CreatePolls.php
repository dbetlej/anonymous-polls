<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePolls extends Component
{
    public $name;
    public $slug;
    public $status = true;

    protected $rules = [
        'name' => ['nullable', 'string'],
        'status' => ['required', 'boolean'],
        'slug' => ['required', 'filled', 'unique:polls,slug'],
    ];

    public function render()
    {
        return view('livewire.create-polls');
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
            $id=DB::select("SHOW TABLE STATUS LIKE 'polls'");
            $next_id=$id[0]->Auto_increment;
            $validated['name'] = 'Poll: ' . $next_id;
        }

        Poll::create($validated + ['creator_id' => auth()->user()->id]);

        session()->flash('message', 'Poll successfully created.');
    }
}
