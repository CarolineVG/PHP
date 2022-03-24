<?php
include_once('../../classes/Artist.php');

$artist = new Artist();
$id = (int)$_GET['id'];
$artist->setArtistId($id);
$res = $artist->getArtistById();
print json_encode($res);