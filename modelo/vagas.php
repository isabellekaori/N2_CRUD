<?php
class Vagas
{
    private $descricao;
    private $info;
    private $email;
    private $idVaga;


    function __construct($idVaga, $descricao, $email, $info)
    {
        $this->idVaga = $idVaga;
        $this->descricao = $descricao;
        $this->email = $email;
        $this->info = $info;
    }

    public function getIdVaga()
    {
        return $this->idVaga;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }
}
