<?php
//
/** @var \App\Models\Game[]|\Illuminate\Database\Eloquent\Collection $games */
?>

@extends('layouts.main')

@section('title', 'List of Games')

@section('main')
<header>
   <h1>All Our Game Offers</h1> 
   @auth
   <div class="container-center"><a href="{{  route('games.formNew') }}">Upload a New Game</a></div>
   @else
   <p>Check Out all Our Games we have to Offer!</p>
   @endauth
  </header>

    <div class="cards">
      @foreach($games as $game)
      <div class="card">
        <div class="card_img card1"><x-game-cover :game="$game" /></div>
            <h3>{{ $game->title }}</h3>
            <p>{{ $game->date }}</p>
            <div class="line">
            </div>
            <p>{{ $game->description }}</p> 
            <a href="{{ url('games/' . $game->game_id) }}" class="button-35">View More</a>
            
            @auth
            <form action="{{ route('games.processReservation', ['id' => $game->game_id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-secondary">Reserve</button>
            </form>
                <div class="d-flex justify-content-between gap-1">
                    <a href="{{ route('games.formUpdate', ['id' => $game->game_id]) }}" class="btn btn-secondary">Edit</a>
                    <a href="{{ route('games.confirmDelete', ['id' => $game->game_id]) }}" class="btn btn-danger">Delete</a>
                </div>
            @else
            @endauth
        </div>
        @endforeach
    </div>
@endsection
