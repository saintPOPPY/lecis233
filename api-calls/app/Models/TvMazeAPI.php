<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

//TvMazeAPI::fetch()
class TvMazeAPI {
    public static function fetch($showNumber) {
        $episodesData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        //Laravel collection
        $episodesCollection = collect($episodesData);

        //Map over, converting each data point within this json into an Episode object
        return $episodesCollection->map(function($show){
            return new Episode($show['name'], $show['image']['medium'], $show['season'], $show['number'], $show['summary']);
        });
    }
}