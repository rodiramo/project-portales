<?php
/** @var \App\Models\News $new
 * 
*/
?>
@extends('layouts.main')


@section('title', 'About ' . $new->title)

@section('main')

<header class="smaller-header">
    <h1>{{ $new->title }}</h1>
</header>
    <x-news-data :new="$new" />

@endsection