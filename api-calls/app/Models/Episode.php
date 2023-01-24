<?php

namespace App\Models;

class Episode {
    public function __construct($name, $image, $season, $episode, $summary) {
        $this->name = $name;
        $this->image = $image;
        $this->season = $season;
        $this->episode = $episode;
        $this->summary = $summary;
    }

    public function __toString() {
        return "Name: $this->name";
    }
}