<?php

namespace model\hrac;

class hrac {
    private $id;
    private $nickname;
    private $email;
    private $password;
    private $id_postavy;
    private $result;
    private $rowHrac;
    private $conn;


    public function __construct($id = null, string $nickname = null,string $email = null, string $password = null)
    {
        $this->conn = mysqli_connect("localhost", "root", "", "reglog");
        if ($id != null) {
            $this->id = $id;
            $this->result = mysqli_query($this->conn, "SELECT * FROM gm_player WHERE id = $this->id");
        } else if ($nickname != null && $password != null && $email == null) {
            $this->nickname = $nickname;
            $this->encode($password);
            $this->result = mysqli_query($this->conn, "SELECT * FROM gm_player WHERE nickname = '$this->nickname' OR email = '$this->nickname'");
        } else if ($nickname != null && $email != null && $password != null) {
            $this->nickname = $nickname;
            $this->email = $email;
            $this->encode($password);
            $this->result = mysqli_query($this->conn,"SELECT * FROM gm_player WHERE nickname = '$this->nickname' OR email = '$this->email'");
        } else if ($email != null && $nickname == null && $password == null) {
            $this->email = $email;
            $this->result = mysqli_query($this->conn, "SELECT * FROM gm_player WHERE email = '$this->email'");
        } else if ($email == null && $nickname != null && $password == null) {
            $this->nickname = $nickname;
            $this->result = mysqli_query($this->conn,"SELECT * FROM gm_player WHERE nickname = '$this->nickname'");
        }
        if ($this->skontrolujCiNiejePrazdny()) {
            $this->rowHrac = mysqli_fetch_assoc($this->result);
            $this->id = $this->rowHrac['id'];
            $this->nickname = $this->rowHrac['nickname'];
            $this->email = $this->rowHrac['email'];
            $this->password = $this->rowHrac['password'];
            $this->encode($this->password);
            $this->id_postavy = $this->rowHrac['id_postavy'];
        }
    }

    public function __destruct()
    {
        $this->id = 0;
        $this->conn = null;
        $this->result = null;
        $this->rowHrac = null;
        $this->nickname = null;
        $this->email = null;
        $this->password = null;
        $this->id_postavy = null;
    }

    public function nastavNoveMeno($meno) {
        mysqli_query($this->conn,"UPDATE gm_player SET nickname = '$meno' WHERE id = '$this->id'");
    }

    public function nastavNovyEmail($email) {
        mysqli_query($this->conn,"UPDATE gm_player SET email = '$email' WHERE id = '$this->id'");
    }

    public function nastavNoveHeslo($password) {
        $this->encode($password);
        mysqli_query($this->conn,"UPDATE gm_player SET password = '$this->password' WHERE email = '$this->email'");
    }

    public function vytvorNovehoHraca() {
        $this->encode($this->password);
        mysqli_query($this->conn,"INSERT INTO gm_postava VALUES ('','../img-hracov/fiary1.png',10,10,10,10,10,10,0,1,1,1)");
        mysqli_query($this->conn,"INSERT INTO gm_player(id,nickname,email,password,id_postavy) VALUES('', '$this->nickname','$this->email','$this->password',(SELECT max(id) FROM gm_postava))");
        $this->result = mysqli_query($this->conn, "SELECT * FROM gm_player WHERE nickname= '$this->nickname'");
        $this->nacitajHraca();
    }

    public function nacitajHraca() {
        $this->rowHrac = mysqli_fetch_assoc($this->result);
        $this->id = $this->rowHrac['id'];
        $this->nickname = $this->rowHrac['nickname'];
        $this->email = $this->rowHrac['email'];
        $this->password = $this->rowHrac['password'];
        $this->id_postavy = $this->rowHrac['id_postavy'];
    }

    public function skontrolujCiNiejePrazdny() : bool {
        return mysqli_num_rows($this->result) > 0;
    }

    public function spravneHeslo($password) : bool {
        $this->encode($password);
        return $this->password == $this->rowHrac["password"];
    }

    /**
     * @return mixed
     */
    public function getId() : int
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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;

    }

    /**
     * @param mixed $id
     */

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->encode($password);
        mysqli_query($this->conn, "UPDATE gm_player SET password = '$this->password' WHERE email = '$this->email'");
    }

    public function encode($password) {
        $this->password = base64_encode($password);
    }


}