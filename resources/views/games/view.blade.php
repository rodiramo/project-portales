<?php
/** @var \App\Models\Game $game */
?>

@extends('layouts.main')

@section('title', 'About ' . $game->title)

@section('main')
<header class="smaller-header">
    <h1>{{ $game->title }}</h1>
</header>
    <x-game-data :game="$game" />

@endsection
