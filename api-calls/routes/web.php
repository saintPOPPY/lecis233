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

Route::get('/episodes', function () {
    //Read a showNumber query string variable
    $showNumber = intval(request()->query('showNumber'));
    //, and if not, set default to 1
    $showNumber = $showNumber < 1 ? 10 : $showNumber;

    // --> interpolate number into api call to determine which show's episodes to display
    $episodes = TvMazeAPI::fetch($showNumber);
    //Make an api call to get show episodes
    return view('index', ['episodes' => $episodes]);
});

Route::get('/view-episodes', function () {
    $showNumber = intval(request()->query('showNumber'));
    $showNumber = $showNumber < 1 ? 10 : $showNumber;
    $episodes = Episode::where('show_Number', $showNumber)->get();

    return view('episodes/index', ['episodes' => $episodes]);
});
