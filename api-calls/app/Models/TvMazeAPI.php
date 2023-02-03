<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

//TvMazeAPI::fetch()
class TvMazeAPI
{
    public static function fetch($showNumber)
    {

        $episodesData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        $episodeCollection = collect($episodesData);

        // return $episodeCollections->map(function ($show) {
        return $episodeCollection->map(function ($show) use ($showNumber) {
            $image = isset($show['image']['medium']) ? $show['image']['medium'] : "";

            return Episode::firstOrCreate(['name' => $show['name'], 'image' => $image, 'season' => $show['season'], 'episode' => $show['number'], 'show_number' => $showNumber, 'summary' => strip_tags($show['summary'])]);
        }, $episodeCollection);
        // }
    }
};