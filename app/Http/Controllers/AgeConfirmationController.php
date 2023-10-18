<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class AgeConfirmationController extends Controller
{
    public function formConfirmation(int $id)
    {
        return view('games.age-confirmation', ['id' => $id]);
    }

    public function processConfirmation(Request $request, int $id)
    {
        
        $request->session()->put('isOver18', true);

        return redirect()
            ->route('games.view', ['id' => $id]);
    }
}
