@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Leaf Fighters Game</title>
</head>
<body class="bg-light">
<nav class="navbar sticky-top bg-secondary">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-light" href="#">Leaf Fighters</a>
        <div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-light pr-2"><i class="fa-regular fa-user" style="color: #ffffff;"></i></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    @auth
                        @if(auth()->user()->hasRole('admin'))
                            <li><a class="dropdown-item" href="{{ route('admin.quests.index') }}">Admin View</a></li>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a></li>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="container-fluid bg-light py-2">
    <div class="container">
    <h2 class="py-2">Stories</h2>
        <ol class="list-group list-group-numbered">
            @forelse($stories as $story)
            <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $story->title }}</div>
            {{ $story->description }}
            </div>
            <span class="text-bg-primary rounded-pill px-2"><a class="text-light" href="{{ route('user.storygameshow', $story->id) }}">Read</a></span>
            </li>
            @empty
            <h4>No Stories Available.</h4>
            @endforelse
        </ol>
    </div>
</div>

<div class="container-fluid py-5 mt-3 bg-secondary">
    <div class="container">
        <div class="d-flex justify-content-center">
            <a href="{{ route('user.storygame') }}"><i class="fa-solid fa-book fa-2xl px-4" style="color: #ffffff;"></i></a>
            <a href="{{ route('user.game') }}"><i class="fa-solid fa-house fa-2xl px-4" style="color: #ffffff;"></i></a>
            <a href="{{ route('user.questLog') }}"><i class="fa-regular fa-star fa-2xl px-4" style="color: #ffffff;"></i></a>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/b20f6317fc.js" crossorigin="anonymous"></script>
</body>
</html>

@endsection
