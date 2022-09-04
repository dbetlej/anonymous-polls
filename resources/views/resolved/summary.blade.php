@auth()
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Resolve Summary
            </h2>
            <br>
            <a href="{{ route('polls.index') }}" style="color: deepskyblue">All polls</a>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Poll name: {{ $resolved->poll->name }}</p>
                        <p>All questions: {{ count($resolved->poll->questions) }}</p>
                        <p>Score: {{ $resolved->score }}</p>
                        <p>Started at: {{ $resolved->started_at }}</p>
                        <p>Ended at: {{ $resolved->ended_at }}</p>
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
                Resolve Summary
            </h2>
            <br>
            <a href="{{ route('polls.index') }}" style="color: deepskyblue">All polls</a>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Poll name: {{ $resolved->poll->name }}</p>
                        <p>All questions: {{ count($resolved->poll->questions) }}</p>
                        <p>Score: {{ $resolved->score }}</p>
                        <p>Started at: {{ $resolved->started_at }}</p>
                        <p>Ended at: {{ $resolved->ended_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
@endguest

