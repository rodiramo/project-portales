<?php
//
/** @var \App\Models\News[]|\Illuminate\Database\Eloquent\Collection $news */
?>

@extends('layouts.main')

@section('title', 'Latest News')

@section('main')
<header>
   <h1>All Our News</h1> 
   @auth
   <div class="container-center"><a href="{{  route('news.formNew') }}">Upload a New News</a></div>
   @else
   <p>Catch up to our Latest News!</p>
   
   @endauth
</header>




@foreach($news as $new)
<div class="blog-card">
    <div class="cover">
        <x-news-cover :new="$new" />
    </div>
    <div class="description">
      <h2>{{ $new->title }}</h2>
      <span>{{ $new->date}}</span>
      <div class="line">
    </div>
    
      <p>{{ $new->description }}</p>
      <div class="read-more">
        <a href="{{ url('news/' . $new->news_id) }}" class="button-35">Read More</a>
    </div>
        @auth
        <div class="actions">
        <a href="{{ route('news.formUpdate', ['id' => $new->news_id]) }}" class="button-edit">Edit</a>
        <a href="{{ route('news.confirmDelete', ['id' => $new->news_id]) }}" class="button-delete">Delete</a>
    </div>
        @else
        @endauth
     
    </div>
  </div>

  @endforeach
@endsection
