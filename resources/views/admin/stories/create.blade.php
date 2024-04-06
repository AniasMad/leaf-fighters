@extends('layouts.admin')

@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<!-- Create Post Form -->

<div class="px-6 py-3">
    <h4 class="text-2xl font-bold dark:text-white">{{ __('Create Story') }}</h4>
</div>
<div class="px-6 py-3">
    <form enctype="multipart/form-data" action="{{ route('admin.stories.store') }}" method="post">
    
    @csrf
    <div>
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Quest Title') }}</label>
        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @if($errors->has('title'))
        <span class="text-red-500">{{ $errors->first('title') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Description') }}</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
        @if($errors->has('description'))
            <span class="text-red-500">{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="numPage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Number of Pages') }}</label>
        <input type="text" name="numPage" id="numPage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @if($errors->has('numPage'))
        <span class="text-red-500">{{ $errors->first('numPage') }}</span>
        @endif
    </div>
    </div>
    <div class="px-6 py-4">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Create') }}</button>
    </div>
</form>
</div>

@endsection