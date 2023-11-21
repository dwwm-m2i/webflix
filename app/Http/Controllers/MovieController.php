<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies/index', [
            // Movie::all() fonctionne mais moins optimisé
            'movies' => Movie::with('category')->get(),
        ]);
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id); // Select * from movie where id = :id OU 404

        return view('movies/show', ['movie' => $movie]);
    }

    public function create()
    {
        return view('movies/create', [
            'categories' => Category::all()->sortBy('name'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:1',
            'youtube' => 'nullable|string',
            'released_at' => 'nullable|date',
            'category' => 'nullable|exists:categories,id',
        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->duration = $request->duration;
        $movie->youtube = $request->youtube;
        $movie->cover = 'https://image.tmdb.org/t/p/original/9uqCaPEIep4iBG3U4AqSP20LGjq.jpg';
        $movie->released_at = $request->released_at;
        $movie->category_id = $request->category;
        $movie->save();

        return redirect('/films');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies/edit', [
            'categories' => Category::all()->sortBy('name'),
            'movie' => $movie,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:1',
            'youtube' => 'nullable|string',
            'released_at' => 'nullable|date',
            'category' => 'nullable|exists:categories,id',
        ]);

        $movie = Movie::findOrFail($id); // On va modifier un film
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->duration = $request->duration;
        $movie->youtube = $request->youtube;
        //$movie->cover = 'https://image.tmdb.org/t/p/original/9uqCaPEIep4iBG3U4AqSP20LGjq.jpg';
        $movie->released_at = $request->released_at;
        $movie->category_id = $request->category;
        $movie->save();

        return redirect('/films');
    }

    public function destroy($id)
    {
        Movie::destroy($id); // DELETE FROM movies WHERE id...

        return redirect('/films');
    }
}
