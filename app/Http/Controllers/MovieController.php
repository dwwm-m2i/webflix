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
            'movies' => Movie::all(),
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
        $movie->title = $request->input('title');
        $movie->synopsis = $request->input('synopsis');
        $movie->duration = $request->input('duration');
        $movie->youtube = $request->input('youtube');
        $movie->cover = 'https://image.tmdb.org/t/p/original/9uqCaPEIep4iBG3U4AqSP20LGjq.jpg';
        $movie->released_at = $request->input('released_at');
        $movie->category_id = $request->input('category');
        $movie->save();

        return redirect('/films');
    }
}
