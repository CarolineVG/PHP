<?php

include_once('database.php');

class Artist extends Database {

    private int $artist_id;
    private string $artist_name;

    /**
     * @return array
     */
    public function getArtists(): array{
        $query = $this->connection()->prepare("SELECT * FROM customer");
        $query->execute();

        if($query->rowCount() == 0){
            return null;
        } else {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $arr = array(
                    'artist_id' => htmlspecialchars($result["artist_id"]),
                    'name'=> htmlspecialchars($result["name"])
                );
                return $arr;
            }
        }
    }

}


