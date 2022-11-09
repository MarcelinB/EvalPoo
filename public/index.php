<?php

use App\Model\Adress;
use App\Model\Equine;
use App\Model\JumpCompetition;
use App\Model\Manager;
use App\Model\Rider;
use App\Model\Sheitland;
use App\Model\Stable;
use App\Controller\StoryController;
require_once __DIR__ . "/../src/app.php";


$story = new StoryController();
try {
    $story->aGoodStoryForVincentBray();
} catch (Exception $e) {
}


