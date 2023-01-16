<?php

namespace model\vieUtoky;

class vieUtoky {
    private $result;
    private $rowVieUtoky;
    private $id;
    private $nazovVieUtoku;
    private $vieImgUrl;
    private $nazovFunkcie;
    private $conn;

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_vieutoky WHERE gm_vieutoky.id_vie = (SELECT id_vie FROM gm_postava WHERE id = (SELECT id_postavy FROM gm_player WHERE id = $id))");
        $this->rowVieUtoky = mysqli_fetch_assoc($this->result);
        $this->nazovVieUtoku = $this->rowVieUtoky['nazovVieUtoku'];
        $this->vieImgUrl = $this->rowVieUtoky['vieImgUrl'];
        $this->nazovFunkcie = $this->rowVieUtoky['nazovFunkcie'];
    }

    public  function __destruct()
    {
        $this->id = null;
        $this->conn = null;
        $this->result = null;
        $this->rowVieUtoky = null;
        $this->nazovVieUtoku = null;
        $this->vieImgUrl = null;
        $this->nazovFunkcie = null;
    }

    /**
     * @return mixed
     */
    public function getNazovVieUtoku()
    {
        return $this->nazovVieUtoku;
    }

    /**
     * @return mixed
     */
    public function getVieImgUrl()
    {
        return $this->vieImgUrl;
    }

    /**
     * @return mixed
     */
    public function getNazovFunkcie()
    {
        return $this->nazovFunkcie;
    }

}
