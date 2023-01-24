<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

//TvMazeAPI::fetch()
class TvMazeAPI {
    public static function fetch($showNumber) {
        $episodesData = Http::get("https://www.tvmaze.com/api#show-episode-list")->json();

        
        $episodesCollection = collect($episodesData);

        return $episodesCollection->map(function($episode){
            return new Episode($episode['name'], $episode['image']['medium'], $episode['season'], $episode['episode'], $episode['summary'])
        });
    }
}