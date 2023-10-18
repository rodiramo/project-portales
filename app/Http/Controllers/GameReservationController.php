<?php

namespace App\Http\Controllers;

use App\Mail\GameReserved;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GameReservationController extends Controller
{
    public function processReservation(Request $request, int $id)
    {
        $game = Game::findOrFail($id);
        Mail::to($request->user()->email)->send(new GameReserved($game));

        return redirect()
            ->route('games.index')
            ->with('message.success', 'The booking of <b>' . $game->title . '</b> was successfull.');
    }
}
