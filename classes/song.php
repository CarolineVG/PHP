<?php

include_once('db.php');

class Song extends Database {

    private int $song_id;
    private string $name;
    private int $length;
    private int $album_id;


    /**
     * @return array
     */
    public function getAllSongs(): array{
        $res = array();
        $query = $this->connection()->prepare("SELECT * FROM song");
        $query->execute();

        if($query->rowCount() == 0){
            return null;
        } else {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $arr = array(
                    'song_id' => htmlspecialchars($result["song_id"]),
                    'name'=> htmlspecialchars($result["name"]),
                    'length'=> htmlspecialchars($result["length"]),
                    'album_id'=> htmlspecialchars($result["album_id"])
                );
                array_push($res, $arr);
            }
            return $res; 
        }
    }


    
    // no return
    public function addNewSong(){
        $name = $this->getName();
        $length = $this->getLength();
        $album_id = $this->getAlbumId();

        $query = $this->connection()->prepare("INSERT INTO album(name, length, album_id) 
                                VALUES (:name, :length, :album_id)");
        $query->bindParam(':name', $name);
        $query->bindParam(':length', $length);
        $query->bindParam(':album_id', $album_id);

        $query->execute();
    }






    /* GETTERS AND SETTERS */

    /**
     * @return int
     */
    public function getSongId(): int
    {
        return $this->song_id;
    }

    /**
     * @param int $song_id
     */
    public function setSongId(int $song_id): void
    {
        $this->song_id = $song_id;
    }
    



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


     /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

     /**
     * @return int
     */
    public function getAlbumId(): int
    {
        return $this->album_id;
    }

    /**
     * @param int $album_id
     */
    public function setAlbumId(int $album_id): void
    {
        $this->album_id = $album_id;
    }


}


