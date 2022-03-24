<?php
include_once('../../classes/Artist.php');

$artist = new Artist();
$id = $_GET['id'];
$artist->setArtistId($id);
$artist->deleteArtist();