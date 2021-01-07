<?php

namespace Source\Models;

class FilaDeEspera
{
    private $idFilaDeEspera;
    private $idLivroFk;
    private $idAlunoFk;
    private $posicao;

    public function getIdFilaDeEspera(){
        return $this->idFilaDeEspera;
    }

    public function setIdFilaDeEspera($idFilaDeEspera){
        $this->idFilaDeEspera = $idFilaDeEspera;
    }

    public function getIdAlunoFk(){
        return $this->idAlunoFk;
    }

    public function setIdAlunoFk($idAlunoFk){
        $this->idAlunoFk = $idAlunoFk;
    }

    public function getIdLivroFk(){
        return $this->idLivroFk;
    }

    public function setIdLivroFk($idLivroFk){
        $this->idLivroFk = $idLivroFk;
    }

    public function getPosicao(){
        return $this->posicao;
    }

    public function setPosicao($posicao){
        $this->posicao = $posicao;
    }

}