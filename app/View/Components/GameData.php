<?php

namespace App\View\Components;

use Closure;
use App\Models\Game;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameData extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Game $game
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-data');
    }
}
