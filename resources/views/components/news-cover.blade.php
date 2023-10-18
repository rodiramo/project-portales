<?php
use Illuminate\Support\Facades\Storage
/** @var \App\Models\News $new */
?>

@if($new->cover !== null && Storage::exists('imgs/' . $new->cover))
    <img class="cover" src="{{ Storage::url('imgs/' . $new->cover) }}" alt="{{ $new->cover_description }}">
@else
    <img class="cover" src="{{ url('img/no_image_available.jpg') }}" alt="no image available image">
@endif