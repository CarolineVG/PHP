<?php
include_once('../../classes/Artist.php');

$artist = new Artist();
$artist = $artist->getArtists();
var_dump($artist);