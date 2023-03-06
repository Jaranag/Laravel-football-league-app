@extends('layouts.app')
@section('title', 'Teams')

@section('content')
<section class="min-h-screen bg-white ">
    <div class="container px-6 py-10 mx-auto">
        <div class="flex justify-center space-between">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl ">List of teams:                              </h1>
            
        </div>
        <a href="{{ route('teams.create') }}">
            <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Create a new Team!
            </button>
        </a>
        @foreach ($teams as $team)
        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            <div class="lg:flex">
                <a href="{{ route('teams.show', $team) }}">
                    <img  class="object-cover w-full h-56 rounded-lg lg:w-64" alt="Team crest" src="{{ asset($team->image_path) }}">
                </a>
                <div class="flex flex-col justify-between py-6 lg:mx-6">
                    <a href="{{ route('teams.show', $team) }}" class="text-4xl font-semibold text-gray-800 hover:underline  ">
                        {{ $team->name }}
                    </a>
                    <span class="text-sm text-gray-500 ">Coach: {{ $team->coach }}</span>
                    <span class="text-sm text-gray-500 ">Stadium: {{ $team->stadium }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection