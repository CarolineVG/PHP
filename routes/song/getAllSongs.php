<?php
include_once('../../classes/Song.php');

$song = new Song();
$res = $song->getAllSongs();
print json_encode($res);