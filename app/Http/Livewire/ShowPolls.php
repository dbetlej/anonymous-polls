<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPolls extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.show-polls', [
            'polls' => Poll::paginate(10),
        ]);
    }
}
