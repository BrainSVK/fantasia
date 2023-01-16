<?php

namespace model\boj;

class boj {
    private $id;
    private $obtiaznost;
    private $maxZ;
    private $aktZ;
    private $maxZNep;
    private $aktZNep;
    private $randSilaUtok;
    private $conn;
    private $result;
    private $rowBoj;

    public function __construct($id,int $obtiaznost = null,int $maxZ = null,int $aktZ = null,int $maxZNep = null,int $aktZNep = null,int $randSilaUtok = null) {
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        $this->id = $id;
        if ($obtiaznost != null) {
            $this->obtiaznost = $obtiaznost;
            $this->maxZ = $maxZ;
            $this->aktZ = $aktZ;
            $this->maxZNep = $maxZNep;
            $this->aktZNep = $aktZNep;
            $this->randSilaUtok = $randSilaUtok;
        } else {
            $this->zvolBoj();
        }
    }

    public function __destruct()
    {
        $this->id = null;
        $this->conn = null;
        $this->result = null;
        $this->obtiaznost = null;
        $this->maxZ = null;
        $this->aktZ = null;
        $this->maxZNep = null;
        $this->aktZNep = null;
        $this->randSilaUtok = null;
        $this->rowBoj = null;
    }

    public function zvolBoj() : bool {
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_boj WHERE gm_boj.id_boj = $this->id");
        $this->rowBoj = mysqli_fetch_assoc($this->result);
        if ($this->rowBoj != null) {
            $this->obtiaznost = $this->rowBoj["obtiaznost"];
            $this->maxZ = $this->rowBoj["maxZ"];
            $this->aktZ = $this->rowBoj["aktZ"];
            $this->maxZNep = $this->rowBoj["maxZNep"];
            $this->aktZNep = $this->rowBoj["aktZNep"];
            $this->randSilaUtok = $this->rowBoj["randSilaUtok"];
            return true;
        } else {
            return false;
        }

    }

    public function vytvorBoj() {
        mysqli_query($this->conn,"INSERT INTO gm_boj(id_boj,obtiaznost,maxZ,aktZ,maxZNep,aktZNep,randSilaUtok) VALUES('$this->id', '$this->obtiaznost','$this->maxZ','$this->aktZ','$this->maxZNep','$this->aktZNep','$this->randSilaUtok')");
    }

    public function aktualitujBoj($aktZ,$aktZNep) {
        $this->aktZ = $aktZ;
        $this->aktZNep = $aktZNep;
        mysqli_query($this->conn,"UPDATE gm_boj SET aktZ = $this->aktZ, aktZNep = $this->aktZNep WHERE gm_boj.id_boj = $this->id");
    }

    public function vymazBoj() {
        mysqli_query($this->conn,"DELETE FROM gm_boj WHERE gm_boj.id_boj = '$this->id'");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getObtiaznost(): int
    {
        return $this->obtiaznost;
    }

    /**
     * @return int|null
     */
    public function getMaxZ(): ?int
    {
        return $this->maxZ;
    }

    /**
     * @return int|null
     */
    public function getAktZ(): ?int
    {
        return $this->aktZ;
    }

    /**
     * @return int|null
     */
    public function getMaxZNep(): ?int
    {
        return $this->maxZNep;
    }

    /**
     * @return int|null
     */
    public function getAktZNep(): ?int
    {
        return $this->aktZNep;
    }

    /**
     * @return int|null
     */
    public function getRandSilaUtok(): ?int
    {
        return $this->randSilaUtok;
    }

}
