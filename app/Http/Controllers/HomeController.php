<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\News;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function home()
    {

        $game = Game::latest()->first(); 
        $new = News::latest()->first(); 
    
        return view('home', ['game' => $game, 'new' => $new]);
    }


    public function about()
    {
        return view('about');
    }
}
