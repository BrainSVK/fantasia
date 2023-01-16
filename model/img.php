<?php

namespace model\img;

class img {
    private $result;
    private $id;
    private $id_postavy;
    private $img;
    private $conn;
    private $rowImg;


    public function __construct($id_postavy)
    {
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        $this->id_postavy = $id_postavy;
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_img WHERE gm_img.id_postavy =  $this->id_postavy");
        if ($this->skontrolujCiNiejePrazdny()) {
            $this->rowImg = mysqli_fetch_assoc($this->result);
            $this->id = $this->rowImg['id_img'];
            $this->img = $this->rowImg['img'];
        }
    }

    public function skontrolujCiNiejePrazdny() : bool {
        return mysqli_num_rows($this->result) > 0;
    }

    public function vlozImg($img) {
        $this->img = $img;
    }

    public function uploadObrazok() {
        mysqli_query($this->conn, "INSERT INTO gm_img(id_img,id_postavy,img) VALUES('', '$this->id_postavy','$this->img')");
    }

    public function removeObrazok() {
        mysqli_query($this->conn,"DELETE FROM gm_img WHERE gm_img.id_postavy = '$this->id_postavy'");
    }

    /**
     * @return mixed
     */
    public function getImg(): mixed
    {
        return $this->img;
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdPostavy()
    {
        return $this->id_postavy;
    }

}
