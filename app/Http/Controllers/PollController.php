<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PollController extends Controller
{
    public function index()
    {
        return view('poll.index');
    }

    public function create()
    {
        return view('poll.create');
    }

    public function show(Poll $poll)
    {
        return view('poll.show', compact('poll'));
    }

    public function edit(Poll $poll)
    {
        return view('poll.edit', compact('poll'));
    }

    public function destroy(Poll $poll)
    {
        $poll->delete();

        return redirect()->route('polls.index');
    }
}
