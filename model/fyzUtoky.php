<?php

namespace model\fyzUtoky;

class fyzUtoky {
    private $result;
    private $rowFyzUtoky;
    private $id;
    private $nazovFyzUtoku;
    private $fyzImgUrl;
    private $nazovFunkcie;
    private $conn;

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_fyzutoky WHERE gm_fyzutoky.id_fyz = (SELECT id_fyz FROM gm_postava WHERE id = (SELECT id_postavy FROM gm_player WHERE id = $id))");
        $this->rowFyzUtoky = mysqli_fetch_assoc($this->result);
        $this->nazovFyzUtoku = $this->rowFyzUtoky['nazovFyzUtoku'];
        $this->fyzImgUrl = $this->rowFyzUtoky['fyzImgUrl'];
        $this->nazovFunkcie = $this->rowFyzUtoky['nazovFunkcie'];
    }

    public function __destruct()
    {
        $this->id = null;
        $this->conn = null;
        $this->result = null;
        $this->rowFyzUtoky = null;
        $this->nazovFyzUtoku = null;
        $this->fyzImgUrl = null;
        $this->nazovFunkcie = null;
    }

    /**
     * @return mixed
     */
    public function getNazovFyzUtoku()
    {
        return $this->nazovFyzUtoku;
    }

    /**
     * @return mixed
     */
    public function getFyzImgUrl()
    {
        return $this->fyzImgUrl;
    }

    /**
     * @return mixed
     */
    public function getNazovFunkcie()
    {
        return $this->nazovFunkcie;
    }

}
