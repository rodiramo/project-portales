<?php
/** @var \App\Models\Game $game */
?>
<div class="d-flex gap-4">
    <div class="col-3">
        @if($game->cover !== null && file_exists(public_path('img/' . $game->cover)))
            <img class="mw-100" src="{{ url('img/' . $game->cover) }}" alt="{{ $game->cover_description }}">
        @else
            <p>No Cover</p>
        @endif
    </div>

    <dl class="mb-3">
        <dt>Release Date</dt>
        <dd>{{ $game->release_date }}</dd>
        <dt>Price</dt>
        <dd>$ {{ $game->price }}</dd>
    </dl>
</div>

<h2 class="mb-3">Description</h2>
<div>{{ $game->description }}</div>
