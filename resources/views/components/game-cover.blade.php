<?php
use Illuminate\Support\Facades\Storage;
/** @var \App\Models\Game $game */
?>

@if($game->cover !== null && Storage::exists('imgs/' . $game->cover))
<p>Theres no Cover Image.</p>
@else
<img class="mw-100" src="{{ Storage::url('imgs/' . $game->cover) }}" alt="{{ $game->cover_description }}">

@endif