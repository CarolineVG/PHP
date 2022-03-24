<?php
include_once('../../classes/Artist.php');

$artist = new Artist();
$name = $_GET['name']; // todo special characters
$artist->setArtistName($name);
$artist->addNewArtist();