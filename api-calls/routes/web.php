<?php

use App\Models\Episode;
use Illuminate\Support\Facades\Route;
use App\Models\TvMazeAPI;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Updated from '/episodes to /load-episodes
Route::get('/load-episodes', function () {
    //Read a showNumber query string variable
    $showNumber = intval(request()->query('showNumber'));
    //, and if not, set default to 1
    $showNumber = $showNumber < 1 ? 1 : $showNumber;

    // --> interpolate number into api call to determine which show's episodes to display
    $episodes = TvMazeAPI::fetch($showNumber);
    //Make an API call to get show episodes
    return view('index', ['episodes' => $episodes]);
});

// New route connecting to the Model class
Route::get('/view-episodes', function () {
    $showNumber = intval(request()->query('showNumber'));           // read a showNumber query string 
    $showNumber = $showNumber < 1 ? 1 : $showNumber;                // if not, set to 1 (as above)

    // Eloquent Model database, where 'show_Number' is equal to $showNumber
    $episodes = Episode::where('show_Number', $showNumber)->get();

    // Pass the $episodes to the view, make an API call to get show episodes
    return view('index', ['episodes' => $episodes]);
});
