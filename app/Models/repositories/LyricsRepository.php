<?php

namespace App\Models\repositories;

use App\Models\Lyric;

interface LyricsRepository
{
    public function addLyric(Lyric $lyric);
    public function updateLyric(Lyric $lyric);
    public function deleteLyricById(int $id);
}