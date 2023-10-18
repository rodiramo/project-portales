<?php

/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.main')

@section('title', 'Upload New News')

@section('main')
<header class="smaller-header">
    <h1>Upload a New</h1>
    
    <p>Please fill all data required(*)</p>
</header>

    <form class="form-data" action="{{ route('news.processNew') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3 d-flex flex-column">
            <label for="title" class="form-label">Title*</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control"
                value="{{ old('title') }}"
                @if($errors->has('title')) aria-describedby="error-title" @endif
            >
        @if($errors->has('title'))
        <div class="text-danger p-2" id="error-title"><i class='bx bx-error' style='color:#ff0909'  ></i>{{ $errors->first('title')}}</div>
        @endif
        </div>
    
        
        <div class="mb-3 d-flex flex-column">
            <label for="description" class="form-label">Description* (must be more than 10 characters long.)</label>
            <textarea
                id="description"
                name="description"
                class="form-control"
                @error('description') aria-describedby="error-description" @enderror
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger py-2" id="error-description">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="cover" class="form-label">Cover <span class="small">(optional)</span></label>
            <input
            type="file"
            id="cover"
            name="cover"
            class="form-control"
            @error('cover') aria-describedby="error-cover" @enderror
        >
        @error('cover')
            <div class="text-danger py-2" id="error-cover">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="cover_description" class="form-label">Cover Description<span class="small">(optional)</span></label>
            <input
            type="text"
            id="cover_description"
            name="cover_description"
            class="form-control"
            value="{{ old('cover_description') }}"
            @error('cover_description') aria-describedby="error-cover_description" @enderror
        >
        @error('cover_description')
            <div class="text-danger py-2" id="error-cover_description">{{ $message }}</div>
        @enderror
        </div>
    
        <button type="submit" class=" button-35">Upload</button>
    </form>
@endsection
