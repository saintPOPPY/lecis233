<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

//TvMazeAPI::fetch()
class TvMazeAPI
{
    public static function fetch($showNumber) {
        $episodesData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        // Laravel collection
        $episodeCollection = collect($episodesData);

        // Map over collection to create a new Episode object
        return $episodeCollection->map(function ($show) use ($showNumber) {
            // Declare and set variable $image to be more flexible in use
            $image = isset($show['image']['medium']) ? $show['image']['medium'] : "";

            // firstOrCreate attempts to find a model matching attributes passed in the first parameter
            // If a model is not found, a model is created and saved after applying attributes passed in the second parameter
            return Episode::firstOrCreate(['name' => $show['name'], 'image' => $image, 'season' => $show['season'], 'episode' => $show['number'], 'show_number' => $showNumber, 'summary' => strip_tags($show['summary'])]);
        }, $episodeCollection); // the collection is second parameter
    }
};