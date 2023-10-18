<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function index()
    {
            $news = News::all(); 
            return view('news.index', ['news' => $news]); 
       
    }
    

    public function view(int $id)
    {      
        $new = News::findorFail($id);

        return view('news.view', [
            'new' => $new,
        ]);
    }
    
    public function formNew()
    {
        return view('news.form-new', [
           'genres' => Genre::orderBy('name')->get(),
        ]);;
    }

    public function processNew(Request $request)
    {
        $data = $request->except(['_token']);
        
        $request->validate(News::validationRules(), News::validationMessages());
        
        if ($request->hasFile('cover')) {
            $data['cover'] = $this->uploadCover($request);
        }

        try {
            DB::transaction(function() use ($data) {
                $new = News::create($data);
            });

           
        return redirect()
        ->route('news.index')
        ->with('message.success', 'The news <b>' . e($data['title']) . '</b> was successfully uploaded!');
        } catch(\Exception $e) {
            return redirect()
                ->route('news.formNew')
                ->withInput()
                ->with('message.error', 'The news <b>' . e($data['title']) . '</b> could not be saved. Please try again.')
                ->with('message.type', 'danger');
        }
    }

    
    public function formUpdate(int $id)
    {
        return view('news.form-update', [
            'new' => News::findOrFail($id)
        ]);
    }

  
    public function processUpdate(Request $request, int $id)
    {
        $new = News::findOrFail($id);

        $request->validate(News::validationRules(), News::validationMessages());

        $data = $request->except(['_token']);

        $oldCover = $new->cover;

        if ($request->hasFile('cover')) {
            $data['cover'] = $this->uploadCover($request);
        }

        try {
            DB::transaction(function() use ($new, $data) {
                $new->update($data);
            });
        } catch(\Exception $e) {
            return redirect()
                ->route('news.formUpdate', ['id' => $id])
                ->withInput() 
                ->with('message.error', 'The News <b>' . e($data['title']) . '</b> could not be updated. Please try again later.')
                ->with('message.type', 'danger');
        }

        
        if ($oldCover && Storage::exists('imgs/' . $oldCover)) {
            Storage::delete('imgs/' . $oldCover);
        }

        return redirect()
            ->route('news.index')
            ->with('message.success', 'The news <b>' . e($new->title) . '</b> was successfully edited.');
    }

    public function confirmDelete(int $id)
    {
        return view('news.delete', [
            'new' => News::findOrFail($id),
        ]);
    }

    public function processDelete(int $id)
    {
        $new = News::findOrFail($id);

        try {
            DB::transaction(function() use ($new) {
                $new->delete();
            });
        } catch(\Exception $e) {
            
            return redirect()
                ->route('news.confirmDelete', ['id' => $id])
                ->withInput() 
                ->with('message.error', 'The News <b>' . e($new->title) . '</b> could not be deleted. Please try again later.')
                ->with('message.type', 'danger');
        }

        return redirect()
            ->route('news.index')
            ->with('message.success', 'The news <b>' . e($new->title) . '</b> was successfully deleted.');
    }

    public function showNewestNews()
    {
        $new = News::latest()->first(); 
        return view('home', ['new' => $new]); 
    }

    /**
     * Upload cover image and return the file name.
     *
     * @param Request $request
     * @return string
     */
    protected function uploadCover(Request $request): string
{
    $cover = $request->file('cover');

    if (!$cover) {
        \Log::error('Cover file not found.');
        return '';
    }

    $title = $request->input('title');
    $coverName = date('YmdHis_') . \Str::slug($title) . "." . $cover->guessExtension();

    try {
        $cover->storeAs('imgs', $coverName);
    } catch (\Exception $e) {
        \Log::error('Error storing cover image: ' . $e->getMessage());
    }

    return $coverName;
}

}