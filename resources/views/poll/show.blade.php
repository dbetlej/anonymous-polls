@auth()
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Poll: {{ $poll->name }}
            </h2>
            <h6>Views:{{ $poll->views }}  Published_at: {{ $poll->published_at }}</h6>
            <br>
            <a href="{{ route('polls.index') }}" style="color: deepskyblue">All polls</a>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Average Score: {{ $poll->resolveds->avg('score') }}</p>
                        <p>Resolveds: {{ $poll->resolveds->count() }}</p>
                        @foreach($poll->questions as $question)
                            <h4>Question {{ $question->order }} - {{ $question->name }}</h4>
                            <span>Correct answer: {{ $question->correct_answer }}</span>
                            @php
                                $answers = $question->answers->groupBy('value');
                                $topAnswerCounter = 0;
                                $topAnswer = '';
                                foreach ($answers as $answer => $items) {
                                    if($topAnswerCounter > $items->count()) {
                                        continue;
                                    } else if ($topAnswerCounter == $items->count()) {
                                        $topAnswer .= ' | ' . $answer;
                                        continue;
                                    }
                                    $topAnswer = $answer;
                                    $topAnswerCounter = $items->count();
                                }
                            @endphp
                            <p>Top answer: {{ $topAnswer }} Counter: {{ $topAnswerCounter }}</p>
                        @endforeach
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        @livewire('show-resolveds', ['poll' => $poll])
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endauth

