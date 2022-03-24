<?php
include_once('../../classes/Album.php');

$album = new Album();
$id = (int)$_GET['id'];
$album->setAlbumId($id);
$res = $album->getAlbumById();
print json_encode($res);