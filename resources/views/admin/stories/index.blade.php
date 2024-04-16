@extends('layouts.admin')

@section('content')
<!-- <a href="{{ route('quests.create') }}">Create</a> -->

<div class="relative overflow-x-auto sm:rounded-lg py-4 flex">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Number of pages
                </th>
                <th scope="col" class="px-6 py-3">
                    Created
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            
            @forelse($stories as $story)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $story->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $story->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $story->numPage }}
                </td>
                <td class="px-6 py-4">
                    {{ $story->created_at }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.stories.show', $story->id) }}">Read more</a>
                </td>
            </tr>
            @empty
            <h4>Stories not Found!</h4>
            @endforelse
        </tbody>
    </table>
</div>
    <div class="py-1 px-4">
        <a href="{{ route('admin.stories.create') }}"><button type="button" class="text-dark bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Create') }}</button></a>
    </div>

@endsection