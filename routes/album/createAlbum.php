<?php
include_once('../../classes/Album.php');

$album = new Album();

$title = $_GET['title']; // todo special characters
$price = $_GET['price'];
$btw = $_GET['btw'];
$artist_id = $_GET['id'];

$album->setTitle($title);
$album->setPrice($price);
$album->setBtw($btw);
$album->setArtistId($artist_id);

$album->addNewAlbum();