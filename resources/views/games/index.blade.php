@extends('layouts.app')
@section('title', 'Games')

@section('content')
<div class="min-h-screen container flex flex-col ">


    <!-- component -->
    <a href="{{ route('games.create') }}">
        <div class="relative mt-5 flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
            <div class="w-full h-30 md:w-1/3 bg-white grid place-items-center">
            </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <h3 class="font-black text-gray-800 md:text-3xl text-xl"></h3>
                <p class="md:text-lg text-gray-500 text-base">Create new game!</p>
                <p class="text-xl font-black text-gray-800">
                </p>
            </div>
        </div>
    </a>

    @foreach ($games as $game)

    <a href="{{ route('games.show', $game) }}">
        <div class=" relative mt-5 flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
            <div class="w-full h-30 md:w-1/3 bg-white grid place-items-center">
            </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{ $game->local_team->name }}: </h3>
                <p class="md:text-lg text-gray-500 text-base">{{ $game->local_goals }}</p>
            </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{ $game->away_team->name }}: </h3>
                <p class="md:text-lg text-gray-500 text-base">{{ $game->away_goals }}</p>
            </div>
            <p class="md:text-lg text-gray-500 text-base">Date: {{ $game->date }} - {{ $game->time }}</p>
        </div>
    </a>

    @endforeach

</div>@endsection
