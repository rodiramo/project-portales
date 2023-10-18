<?php
/** @var \App\Models\News $new 
 * 
*/
?>

@extends('layouts.main')

@section('title', 'Confirm Delete ' . $new->title)

@section('main')
<header class="smaller-header">
    <h1 class="mb-3 d-flex flex-column">Delete News '{{ $new->title }}'?</h1>
</header>
    <form class="form-data" action="{{ route('news.processDelete', ['id' => $new->news_id]) }}" method="post">
    
        @csrf
        <h2 class="visually-hidden">Confirm</h2>
        <p>Are you sure you want to delete this News?</p>
        <button type="submit" class="btn btn-danger">Yes, I want to delete this News.</button>
    </form>
    <x-news-data :new="$new" />

@endsection
