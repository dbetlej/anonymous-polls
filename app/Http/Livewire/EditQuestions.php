<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class EditQuestions extends Component
{
    public $name, $correct_answer, $question;

    protected $rules = [
        'name' => ['required', 'filled'],
        'correct_answer' => ['required', 'filled'],
    ];

    public function render()
    {
        return view('livewire.edit-questions');
    }

    public function mount(Question $question)
    {
        $this->name = $question->name;
        $this->correct_answer = $question->correct_answer;
    }

    public function update()
    {
        $this->validate();

        $this->question->name = $this->name;
        $this->question->correct_answer = $this->correct_answer;
        $this->question->save();

        session()->flash('message', 'Question Has Been Updated Successfully.');
    }
}
