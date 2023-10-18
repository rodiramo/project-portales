<?php
/** @var \App\Models\Game $game */
?>

@extends('layouts.main')

@section('title', 'Confirm delete ' . $game->title)

@section('main')
<header class="smaller-header">
    <h1 class="mb-3">Delete the game '{{ $game->title }}'?</h1>
</header>

<form class="form-data" action="{{ route('games.processDelete', ['id' => $game->game_id]) }}" method="post">
    @csrf
    <h2 class="visually-hidden">Confirm</h2>
    <p>Are you sure you want to delete this game?</p>
    <button type="submit" class="btn btn-danger">Yes, I want to delete this game.</button>
    
</form>


<x-game-data :game="$game" />


@endsection
