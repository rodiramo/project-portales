<?php

namespace App\View\Components;

use Closure;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsData extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public News $new
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-data');
    }
}
