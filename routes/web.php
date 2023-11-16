<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'name' => 'Fiorella',
        'games' => [
            'Elden Ring',
            'Call of Duty',
            'FC 24',
        ],
    ]);
});

// {friend} = Paramètre obligatoire
// {friend?} = Paramètre optionnel
Route::get('/fiorella/{friend?}', function (Request $request, $friend = null) {
    // dump($friend);
    // dump($_GET); // Interdit avec Laravel
    // dump($request->color); // $_GET['color'] ?? null;
    // dump(request('color')); // $_GET['color'] ?? null;

    return view('presentation', [
        'age' => Carbon::parse('2019-12-31')->age,
        'friend' => ucfirst($friend),
        'color' => $request->color,
    ]);
});
