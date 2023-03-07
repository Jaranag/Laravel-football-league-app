@extends('layouts.app')
@section('title', 'Game')


@section('content')
<section class="min-h-screen bg-white ">
    <div class="container px-6 py-10 mx-auto">
        <div class="mt-10 inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Home
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            |
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            -
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            |
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Away
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Stadium
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            View
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <a href="{{ route('games.show', $game) }}">
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 hidden sm:table-cell">
                                        <img class="w-full h-full rounded-full" alt="Team crest" src="{{ asset($game->local_team->image_path) }}" />
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('teams.show', $game->local_team) }}" class="text-gray-900 whitespace-no-wrap">
                                            {{ $game->local_team->name }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">{{ $game->local_goals }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p>VS</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                    {{ $game->away_goals }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                <div class="flex items-center float-right">
                                    <div class="mr-3">
                                        <a href="{{ route('teams.show', $game->away_team) }}" class="text-gray-900 whitespace-no-wrap text-right">
                                            {{ $game->away_team->name }}
                                        </a>
                                    </div>
                                    <div class="flex-shrink-0 w-10 h-10 hidden sm:table-cell">
                                        <img class="w-full h-full rounded-full" alt="Team crest" src="{{ asset($game->away_team->image_path) }}" />
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">{{ $game->date }} | {{ $game->time }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">{{ $game->local_team->stadium }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('games.show', $game) }}">
                                    <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </a>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('games.edit', $game )}}" type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update score </a>
            <form method="post" action="{{ route('games.delete', $game )}}">
                @csrf @method('delete')
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">DELETE! </button>
            </form>
        </div>
    </div>
</section>
@endsection