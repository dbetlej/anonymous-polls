@auth()
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Poll: {{ $poll->name }}
            </h2>
            <br>
            <a href="{{ route('polls.index') }}" style="color: deepskyblue">All polls</a>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('resolveds.store', $resolved->access_key) }}" method="POST">
                            @csrf
                            @foreach($poll->questions as $question)
                                <h4>{{ $question->name }}</h4> <br>
                                @if($question->correct_answer === "true" || $question->correct_answer === "false")
                                    <input type="radio" name="answer[{{ $question->id }}]" value="true" id="answer-yes-{{ $question->id }}" checked>
                                    <label for="answer-yes-{{ $question->id }}">Yes</label>
                                    <input type="radio" name="answer[{{ $question->id }}]" value="false" id="answer-no-{{ $question->id }}">
                                    <label for="answer-no-{{ $question->id }}">No</label>
                                @else
                                    <input type="text" name="answer[{{ $question->id }}]" placeholder="Answer" required/>
                                @endif
                                <br>
                                <br>
                            @endforeach

                            <button type="submit">Resolve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endauth
@guest
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Poll: {{ $poll->name }}
            </h2>
            <br>
            <a href="{{ route('polls.index') }}" style="color: deepskyblue">All polls</a>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('resolveds.store', $resolved->access_key) }}" method="POST">
                            @csrf
                            @foreach($poll->questions as $question)
                                <h4>{{ $question->name }}</h4> <br>
                                @if($question->correct_answer === "true" || $question->correct_answer === "false")
                                    <input type="radio" name="answer[{{ $question->id }}]" value="true" id="answer-yes-{{ $question->id }}" checked>
                                    <label for="answer-yes-{{ $question->id }}">Yes</label>
                                    <input type="radio" name="answer[{{ $question->id }}]" value="false" id="answer-no-{{ $question->id }}">
                                    <label for="answer-no-{{ $question->id }}">No</label>
                                @else
                                    <input type="text" name="answer[{{ $question->id }}]" placeholder="Answer" required/>
                                @endif
                                <br>
                                <br>
                            @endforeach

                            <button type="submit">Resolve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
@endguest

