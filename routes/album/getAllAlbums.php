<?php
include_once('../../classes/Album.php');

$album = new Album();
$res = $album->getAlbums();
print json_encode($res);