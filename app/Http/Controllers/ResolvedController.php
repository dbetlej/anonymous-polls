<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Resolved;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResolvedController extends Controller
{
    public function resolve(Poll $poll)
    {
        $resolved = $poll->resolveds()->create([
            'access_key' => Str::uuid(),
            'started_at' => now(),
        ]);
        $poll->load('questions');
        $poll->update(['views' => ++$poll->views]);

        return view('resolved.poll', compact(['resolved', 'poll']));
    }

    public function store(Request $request, Resolved $resolved)
    {
        if ($resolved->ended_at !== null) {
            abort(404);
        }

        $resolved->load('poll.questions');

        $score = 0;
        foreach ($resolved->poll->questions as $question) {
            $answer = $request->answer[$question->id];
            $resolved->answers()->create([
                'question_id' => $question->id,
                'value' => $answer,
            ]);

            if($question->correct_answer == $answer) {
                $score++;
            }
        }

        $resolved->update([
            'ended_at' => now(),
            'score' => $score,
        ]);

        return redirect()->route('resolveds.show', $resolved->access_key);
    }

    public function show(Resolved $resolved)
    {
        $resolved->load(['poll.questions', 'answers']);

        return view('resolved.summary', compact('resolved'));
    }
}
