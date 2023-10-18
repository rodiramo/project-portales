<?php
/** @var \App\Models\Game $game */
?>
<div class="form-data d-flex flex-column align-items-center justify-content-center gap-4 mb-4">
    <div>
        <x-game-cover :game="$game" />
    </div>

    <dl class="mb-3">
        <dt>Release Date</dt>
        <dd>{{ $game->release_date }}</dd>
        <dt>Price</dt>
        <dd>$ {{ $game->price }}</dd>
      
    </dl>


<h3 class="mb-3">Description</h3>
<p>{{ $game->description }}</p>
</div>