<?php

include_once('db.php');

class Album extends Database {

    private int $album_id;
    private string $title;
    private float $price;
    private float $btw;
    private int $artist_id;


    /**
     * @return array
     */
    public function getAlbums(): array{
        $res = array();
        $query = $this->connection()->prepare("SELECT * FROM album");
        $query->execute();

        if($query->rowCount() == 0){
            return null;
        } else {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $arr = array(
                    'album_id' => htmlspecialchars($result["album_id"]),
                    'title'=> htmlspecialchars($result["title"]),
                    'price'=> htmlspecialchars($result["price"]),
                    'btw'=> htmlspecialchars($result["btw"]),
                    'artist_id'=> htmlspecialchars($result["artist_id"])
                );
                array_push($res, $arr);
            }
            return $res; 
        }
    }

    /**
     * @return array
     */
    public function getAlbumById(): array{
        $res = array();
        $id = $this->getAlbumId();
        $query = $this->connection()->prepare("SELECT * FROM album WHERE album_id = :album_id");
        $query->bindParam(':album_id', $id);
        $query->execute();

        if($query->rowCount() == 0){
            return array();
        } else {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                // artist ID -> search artist
                $query2 = $this->connection()->prepare("SELECT * FROM artist WHERE artist_id = :artist_id");
                $query2->bindParam(':artist_id', $result["artist_id"]);
                $query2->execute();

                while($result2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                    $item = array(
                        'album_id' => htmlspecialchars($result["album_id"]),
                        'title'=> htmlspecialchars($result["title"]),
                        'price'=> htmlspecialchars($result["price"]),
                        'btw'=> htmlspecialchars($result["btw"]),
                        'artistId' => htmlspecialchars($result2["artist_id"]),
                        'name'=> htmlspecialchars($result2["name"])
                    );
                }
                array_push($res, $item);
            }
            return $res;
        }
    }

    // no return
    public function addNewAlbum(){
        $title = $this->getTitle();
        $price = $this->getPrice();
        $btw = $this->getBtw();
        $artist_id = $this->getArtistId();

        $query = $this->connection()->prepare("INSERT INTO album(title, price, btw, artist_id) 
                                VALUES (:title, :price, :btw, :artist_id)");
        $query->bindParam(':title', $title);
        $query->bindParam(':price', $price);
        $query->bindParam(':btw', $btw);
        $query->bindParam(':artist_id', $artist_id);

        $query->execute();
    }




    /* GETTERS AND SETTERS */

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
    



    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


     /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $title
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

     /**
     * @return float
     */
    public function getBtw(): float
    {
        return $this->btw;
    }

    /**
     * @param float $title
     */
    public function setBtw(float $btw): void
    {
        $this->btw = $btw;
    }

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


}


