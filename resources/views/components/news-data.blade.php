<?php
/** @var \App\Models\News $new */
?>


<div class="form-data d-flex flex-column align-items-center justify-content-center gap-4 mb-4">

    <div>
        <x-news-cover :new="$new" />
    </div>

    <dl>
       
        <dt>Date</dt>
        <dd>{{ $new->date }}</dd>
    </dl>
    
    <h3>Description</h3>
    
    <p>{{ $new->description }}</p>

</div>