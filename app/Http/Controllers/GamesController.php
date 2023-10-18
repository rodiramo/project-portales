<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    public function index()
    {
       
        $games = Game::all();

        return view('games/index', [
            'games' => $games,
        ]);
    }

    public function view(int $id)
    {
   
        $game = Game::findorFail($id);

        return view('games.view', [
            'game' => $game,
        ]);
    }
    
    public function formNew()
    {
        return view('games.form-new');
    }

    public function processNew(Request $request)
    {
        $data = $request->except(['_token']);
        
        $request->validate(Game::validationRules(), Game::validationMessages());
        
        if($request->hasFile('cover')) {
            $data['cover'] = $this->uploadCover($request);
        }
        Game::create($data);


        return redirect()
            ->route('games.index')
            ->with('message.success', 'The Game <b>' . e($data['title']) . '</b> was successfully uploaded!');
    }

    
    public function formUpdate(int $id)
    {
        return view('games.form-update', [
            'game' => Game::findOrFail($id),
        ]);
    }

  
    public function processUpdate(Request $request, int $id)
    {
        $game = Game::findOrFail($id);

        $request->validate(Game::validationRules(), Game::validationMessages());

        $data = $request->except(['_token']);

        $oldCover = $game->cover;

        if($request->hasFile('cover')) {
            $data['cover'] = $this->uploadCover($request);
        }

        $game->update($data);

        if($request->hasFile('cover') && Storage::exists('imgs/' . $oldCover)) {
            Storage::delete('imgs/' . $oldCover);
        }
        return redirect()
            ->route('games.index')
            ->with('message.success', 'The game <b>' . e($game->title) . '</b> was successfully edited.');
    }

    public function confirmDelete(int $id)
    {
        return view('games.delete', [
            'game' => Game::findOrFail($id),
        ]);
    }

    public function processDelete(int $id)
    {
        $game = Game::findOrFail($id);

        $game->delete();

      

        return redirect()
            ->route('games.index')
            ->with('message.success', 'The game <b>' . e($game->title) . '</b> was successfully deleted.');
    }

    public function showNewestGame()
    {
        $game = Game::latest()->first();  
        return View::make('home')->with('game', $game);
    }
    /**
     * 
     *
     * @param Request $request
     * @return string
     */

    protected function uploadCover(Request $request): string
    {
        $cover = $request->file('cover');
        $title = $request->input('title');

        $coverName = date('YmdHis_') . \Str::slug($title) . "." . $cover->guessExtension();

        $cover->storeAs('imgs', $coverName);

        return $coverName;
    }
}
