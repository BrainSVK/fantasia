<?php

namespace model\magUtoky;

class magUtoky {
    private $result;
    private $rowMagUtoky;
    private $id;
    private $nazovMagUtoku;
    private $magImgUrl;
    private $nazovFunkcie;
    private $conn;

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_magutoky WHERE gm_magutoky.id_mag = (SELECT id_mag FROM gm_postava WHERE id = (SELECT id_postavy FROM gm_player WHERE id = $id))");
        $this->rowMagUtoky = mysqli_fetch_assoc($this->result);
        $this->nazovMagUtoku = $this->rowMagUtoky['nazovMagUtoku'];
        $this->magImgUrl = $this->rowMagUtoky['magImgUrl'];
        $this->nazovFunkcie = $this->rowMagUtoky['nazovFunkcie'];
    }

    public function __destruct()
    {
        $this->id = null;
        $this->conn = null;
        $this->result = null;
        $this->rowMagUtoky = null;
        $this->nazovMagUtoku = null;
        $this->nazovFunkcie = null;
    }

    /**
     * @return mixed
     */
    public function getNazovMagUtoku()
    {
        return $this->nazovMagUtoku;
    }

    /**
     * @return mixed
     */
    public function getMagImgUrl()
    {
        return $this->magImgUrl;
    }

    /**
     * @return mixed
     */
    public function getNazovFunkcie()
    {
        return $this->nazovFunkcie;
    }

}
