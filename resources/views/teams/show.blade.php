@extends('layouts.app')
@section('title', '{{$team->name}}')

@section('content')
<a href="{{ route('teams.index') }}">
    <div class="relative mt-5 flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div class="w-full h-30 md:w-1/3 bg-white grid place-items-center">
        </div>
        <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
            <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{ $team->name }}</h3>
            <p class="md:text-lg text-gray-500 text-base">Stadium: {{ $team->stadium }}</p>
            <p class="text-xl font-black text-gray-800">
                Coach: {{ $team->coach }}
            </p>
        </div>
    </div>
</a>

<a href="{{ route('teams.edit', $team )}}" type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update </a>
<form method="post" action="{{ route('teams.delete', $team )}}">
    @csrf @method('delete')
    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">DELETE! </button>
</form>

@foreach ($team->games as $game)

<a href="">
    <div class="relative mt-5 flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div class="w-full h-30 md:w-1/3 bg-white grid place-items-center">
        </div>
        <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
            <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{ $game->local_team->name }}</h3>
            <p class="md:text-lg text-gray-500 text-base">{{ $game->away_team->name }}</p>
            <p class="md:text-lg text-gray-500 text-base">{{ $game->date }}</p>
            <p class="text-xl font-black text-gray-800">
                Coach: {{ $game->time }}
            </p>
        </div>
    </div>
</a>

@endforeach
@endsection