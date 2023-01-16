<?php

namespace model\postava;

class postava
{
    private $id;
    private $img;
    private $fyzickaSila;
    private $magickaSila;
    private $viera;
    private $stamina;
    private $vitalita;
    private $stastie;
    private $volneStaty;
    private $id_fyz;
    private $id_mag;
    private $id_vie;
    private $result;
    private $rowPostava;
    private $conn;

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player WHERE id = $this->id)");
        $this->rowPostava = mysqli_fetch_assoc($this->result);
        $this->img = $this->rowPostava['img'];
        $this->fyzickaSila = $this->rowPostava['fyzickaSila'];
        $this->magickaSila = $this->rowPostava['magickaSila'];
        $this->viera = $this->rowPostava['viera'];
        $this->stamina = $this->rowPostava['stamina'];
        $this->vitalita = $this->rowPostava['vitalita'];
        $this->stastie = $this->rowPostava['stastie'];
        $this->volneStaty = $this->rowPostava['volneStaty'];
        $this->id_fyz = $this->rowPostava['id_fyz'];
        $this->id_mag = $this->rowPostava['id_mag'];
        $this->id_vie = $this->rowPostava['id_vie'];
    }

    public function __destruct()
    {
        $this->id = null;
        $this->img = null;
        $this->conn = null;
        $this->result = null;
        $this->rowPostava = null;
        $this->fyzickaSila = null;
        $this->magickaSila = null;
        $this->viera = null;
        $this->stamina = null;
        $this->vitalita = null;
        $this->stastie = null;
        $this->volneStaty = null;
        $this->id_fyz = null;
        $this->id_mag = null;
        $this->id_vie = null;
    }

    public function vymazPostavu() {
        mysqli_query($this->conn,"DELETE FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    public function nastavFyzUtok($fyzUtok) {
        mysqli_query($this->conn, "UPDATE gm_postava SET id_fyz = $fyzUtok WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    public function nastavMagUtok($magUtok) {
        mysqli_query($this->conn, "UPDATE gm_postava SET id_mag = $magUtok WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    public function nastavVieUtok($vieUtok) {
        mysqli_query($this->conn, "UPDATE gm_postava SET id_vie = $vieUtok WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        mysqli_query($this->conn, "UPDATE gm_postava SET img = '$img' WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @return mixed
     */
    public function getFyzickaSila()
    {
        return $this->fyzickaSila;
    }

    /**
     * @return mixed
     */
    public function getMagickaSila()
    {
        return $this->magickaSila;
    }

    /**
     * @return mixed
     */
    public function getViera()
    {
        return $this->viera;
    }

    /**
     * @return mixed
     */
    public function getStamina()
    {
        return $this->stamina;
    }

    /**
     * @return mixed
     */
    public function getVitalita()
    {
        return $this->vitalita;
    }

    /**
     * @return mixed
     */
    public function getStastie()
    {
        return $this->stastie;
    }

    /**
     * @return mixed
     */
    public function getVolneStaty()
    {
        return $this->volneStaty;
    }

    /**
     * @return mixed
     */
    public function getIdFyz()
    {
        return $this->id_fyz;
    }

    /**
     * @return mixed
     */
    public function getIdMag()
    {
        return $this->id_mag;
    }

    /**
     * @return mixed
     */
    public function getIdVie()
    {
        return $this->id_vie;
    }

    /**
     * @param mixed $fyzickaSila
     */
    public function setFyzickaSila($fyzickaSila)
    {
        $this->fyzickaSila = $fyzickaSila;
        mysqli_query($this->conn, "UPDATE gm_postava SET fyzickaSila = $fyzickaSila WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $magickaSila
     */
    public function setMagickaSila($magickaSila): void
    {
        $this->magickaSila = $magickaSila;
        mysqli_query($this->conn, "UPDATE gm_postava SET magickaSila = $magickaSila WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $viera
     */
    public function setViera($viera): void
    {
        $this->viera = $viera;
        mysqli_query($this->conn, "UPDATE gm_postava SET viera = $viera WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $stamina
     */
    public function setStamina($stamina): void
    {
        $this->stamina = $stamina;
        mysqli_query($this->conn, "UPDATE gm_postava SET stamina = $stamina WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $vitalita
     */
    public function setVitalita($vitalita): void
    {
        $this->vitalita = $vitalita;
        mysqli_query($this->conn, "UPDATE gm_postava SET vitalita = $vitalita WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $stastie
     */
    public function setStastie($stastie): void
    {
        $this->stastie = $stastie;
        mysqli_query($this->conn, "UPDATE gm_postava SET stastie = $stastie WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $volneStaty
     */
    public function setVolneStaty($volneStaty): void
    {
        $this->volneStaty = $volneStaty;
        mysqli_query($this->conn, "UPDATE gm_postava SET volneStaty = $volneStaty WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $id_fyz
     */
    public function setIdFyz($id_fyz): void
    {
        $this->id_fyz = $id_fyz;
        mysqli_query($this->conn, "UPDATE gm_postava SET id_fyz = $id_fyz WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $id_mag
     */
    public function setIdMag($id_mag): void
    {
        $this->id_mag = $id_mag;
        mysqli_query($this->conn, "UPDATE gm_postava SET id_mag = $id_mag WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

    /**
     * @param mixed $id_vie
     */
    public function setIdVie($id_vie): void
    {
        $this->id_vie = $id_vie;
        mysqli_query($this->conn, "UPDATE gm_postava SET id_vie = $id_vie WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $this->id)");
    }

}
