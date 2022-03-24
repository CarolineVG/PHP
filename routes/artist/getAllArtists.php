<?php
include_once('../../classes/Artist.php');

$artist = new Artist();
$res = $artist->getArtists();
print json_encode($res);