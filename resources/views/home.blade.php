<?php
//
/** @var \App\Models\News[]|\Illuminate\Database\Eloquent\Collection $news */
/** @var \App\Models\Game[]|\Illuminate\Database\Eloquent\Collection $games */

?>

@extends('layouts.main')

@section('title', 'Home')

@section('main')
<header class="header-home">
<h1>¡Welcome to Pixel Plaza!</h1>
<p class="text-white">The place to get the latest gaming news!</p>
<div class="container-center">
    <a href="{{  route('news.index') }}">News</a>
    <a href="{{  route('games.index') }}">Games</a>
</div>
</header>

<section class="home-news">
    
    <h2>Our Latest New</h2>
    <div class="line"></div>
    <h3>"{{ $new->title }}"</h3>
    <p>{{ $new->date }}</p>
        <p>{{ $new->description }}</p>
    </section>

<section class="home-aboutus">
<div>
    <h2>About Us</h2>
    <div class="line"></div>
    <p>We offer a variety of news dedicated for Video Game fans, ranging from updates, new games announcements and company news. What also makes us special is that we offer the games that we talk about. In our "Games" section you can access all our Game information and soon enough you will be able to purchase games from our Website, so stay tuned!</p>
</div>
</section>
<section class="home-game">
    <h2>Check Our Newest Game "{{ $game->title }}"</h2>    
  <img src="{{ Storage::url('imgs/' . $game->cover) }}" alt="{{ $game->cover_description }}">
  
</section>


@endsection
