<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(Poll $poll)
    {
        return view('question.create', compact('poll'));
    }

    public function edit(Question $question)
    {
        return view('question.edit', compact('question'));
    }
}
