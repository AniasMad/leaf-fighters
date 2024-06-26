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
    <h4 class="text-2xl font-bold dark:text-white">{{ __('Create Story Section') }}</h4>
</div>
<div class="px-6 py-3">
    <form enctype="multipart/form-data" action="{{ route('admin.storysections.store') }}" method="post">
    
    @csrf
    <div>
    <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Story section order') }}</label>
        <input type="text" name="order" id="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @if($errors->has('order'))
        <span class="text-red-500">{{ $errors->first('order') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Story section text') }}</label>
        <textarea id="text" name="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
        @if($errors->has('text'))
            <span class="text-red-500">{{ $errors->first('text') }}</span>
        @endif
    </div>
    <div>
        <label for="story_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Select the Story') }}</label>
        <select id="story_id" name="story_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <option value="" disabled>{{ __('Choose the story') }}</option>
        @foreach(\App\Models\Story::all() as $story)
            <option value="{{ $story->id }}" @if($story->id == old('story')) selected @endif>{{ $story->title }}</option>
        @endforeach
        </select>
    </div>
    <div>
        <input
            type="file"
            name="image"
            placeholder="Image"
            class="w-full mt-6"
            field="image"
            />
        @if($errors->has('image'))
            <span class="text-red-500">{{ $errors->first('image') }}</span>
        @endif
    </div>
    </div>
    <div class="px-6 py-4">
    <button type="submit" class="text-dark bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Create') }}</button>
    </div>
</form>
</div>

@endsection