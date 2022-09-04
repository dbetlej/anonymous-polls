<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateQuestions extends Component
{
    public $name, $correct_answer, $poll;
    public $inputs = [];
    public $i = 1;

    protected $rules = [
        'name' => ['required', 'filled'],
        'correct_answer' => ['required', 'filled'],
    ];

    public function add($i)
    {
        $i += 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $this->poll->load('questions');
        return view('livewire.create-questions');
    }

    public function store()
    {
        $this->validate();

        foreach ($this->name as $key => $value) {
            $this->poll->questions()->create([
                'name' => $this->name[$key],
                'correct_answer' => $this->correct_answer[$key],
                'order' => $key,
            ]);
        }

        $this->inputs = [];
        session()->flash('message', 'Questions Has Been Created Successfully.');
    }
}
