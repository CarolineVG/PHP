<?php

include_once('db.php');

class Artist extends Database {

    private int $artist_id;
    private string $artist_name;


    /**
     * @return array
     */
    public function getArtists(): array{
        $res = array();
        $query = $this->connection()->prepare("SELECT * FROM artist");
        $query->execute();

        if($query->rowCount() == 0){
            return null;
        } else {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $arr = array(
                    'artist_id' => htmlspecialchars($result["artist_id"]),
                    'name'=> htmlspecialchars($result["name"])
                );
                array_push($res, $arr);
            }
            return $res; 
        }
    }


    /**
     * @return array
     */
    public function getArtistById(): array{
        $id = $this->getArtistId();
        $query = $this->connection()->prepare("SELECT * FROM artist WHERE artist_id = :artist_id");
        $query->bindParam(':artist_id', $id);
        $query->execute();

        if($query->rowCount() == 0){
            return array();
        } else {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $arr = array(
                    'artistId' => htmlspecialchars($result["artist_id"]),
                    'name'=> htmlspecialchars($result["name"])
                );
                return $arr;
            }
        }
    }


    // no return
    public function addNewArtist(){
        $artist_name = $this->getArtistName();

        $query = $this->connection()->prepare("INSERT INTO artist(name) VALUES (:artist_name)");
        $query->bindParam(':artist_name', $artist_name);

        $query->execute();
    }


    // no return
    public function updateNewArtist(){
        $artistId = $this->getArtistId();
        $artistName = $this->getArtistName();


        $query = $this->connection()->prepare(
            "UPDATE artist SET name = :artist_name
                 WHERE artist_id=:artist_id");

        $query->bindParam(':artist_id', $artistId);
        $query->bindParam(':artist_name', $artistName);
        $query->execute();
    }


    // no return
    public function deleteArtist()
    {
        $artistId = $this->getArtistId();
        $query = $this->connection()->prepare("DELETE FROM artist WHERE artist_id=:artist_id");
        $query->bindParam(':artist_id', $artistId);
        $query->execute();
    }




    /* GETTERS AND SETTERS */

    /**
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artist_id;
    }

    /**
     * @param int $artist_id
     */
    public function setArtistId(int $artist_id): void
    {
        $this->artist_id = $artist_id;
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artist_name;
    }

    /**
     * @param string $artist_name
     */
    public function setArtistName(string $artist_name): void
    {
        $this->artist_name = $artist_name;
    }


}


