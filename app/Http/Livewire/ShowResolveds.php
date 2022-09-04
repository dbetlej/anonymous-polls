<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class ShowResolveds extends Component
{
    public $poll;

    public function render()
    {
        return view('livewire.show-resolveds', [
            'resolveds' => $this->poll->resolveds()->paginate(10),
        ]);
    }

    public function mount(Poll $poll)
    {
        $this->poll = $poll;
    }
}
