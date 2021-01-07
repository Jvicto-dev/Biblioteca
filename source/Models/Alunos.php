<?php

namespace Source\Models;

class Alunos
{
    private $id_aluno;
    private $nome;
    private $rua;
    private $numero;
    private $cidade;
    private $bairro;
    private $estado;
    private $cep;
    private $turma;
    private $serie;

    public function getIdAluno(){
        return $this->id_aluno;
    }

    public function setIdAluno($id_aluno){
        $this->id_aluno = $id_aluno;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro; 
    }

    public function getEstado(){
        return $this->estado;
    } 

    public function setEstado($estado){
        $this->estado = mb_strtoupper($estado);
    }

    public function getCep(){
        return $this->cep;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function getTurma(){
        return $this->turma;
    }

    public function setTurma($turma){
        $this->turma = mb_strtoupper($turma);
    }

    public function getSerie(){
        return $this->serie;
    }

    public function setSerie($serie){
        $this->serie = $serie;
    }
}
