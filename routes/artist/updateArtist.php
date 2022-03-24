<?php
include_once('../../classes/Artist.php');

$artist = new Artist();
$id = $_GET['id'];
$name = $_GET['name'];
$artist->setArtistId($id);
$artist->setArtistName($name);
$artist->updateNewArtist();