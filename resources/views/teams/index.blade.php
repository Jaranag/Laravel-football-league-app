@extends('layouts.app')
@section('title', 'Teams')

@section('content')
<div class="min-h-screen container justify-center">

    <!-- component -->
    <a href="{{ route('teams.create') }}">
        <div class="relative mt-5 flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
            <div class="w-full h-30 md:w-1/3 bg-white grid place-items-center">
            </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <h3 class="font-black text-gray-800 md:text-3xl text-xl"></h3>
                <p class="md:text-lg text-gray-500 text-base">Create new team</p>
                <p class="text-xl font-black text-gray-800">
                </p>
            </div>
        </div>
    </a>

    @foreach ($teams as $team)

    <article class="rounded-xl border border-gray-700 bg-gray-800 p-4">
        <a href="{{ route('teams.show', $team) }}">
            <div class="flex items-center gap-4">
                <img alt="Team crest" src="{{ asset($team->image_path) }}" class="h-16 w-16 rounded-full object-cover" />
                <div>
                    <h3 class="text-lg font-medium text-white">{{ $team->name }}</h3>
                </div>
            </div>
        </a>
        <ul class="mt-4 space-y-2">
            <li>
                <strong class="font-medium text-white">Coach: </strong>
                <p class="mt-1 text-xs font-medium text-gray-300">{{ $team->coach }}</p>
            </li>
        </ul>
        <ul class="mt-4 space-y-2">
            <li>
                <strong class="font-medium text-white">Stadium: </strong>
                <p class="mt-1 text-xs font-medium text-gray-300">{{ $team->stadium }}</p>
            </li>
        </ul>
    </article>
    @endforeach
</div>
@endsection