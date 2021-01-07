<?php

namespace Source\Models;

class Books
{   
    private $id;
    private $titulo;
    private $autor;
    private $cdd;
    private $dataPublicacao;
    private $editora;
    private $local;
    private $estante;
    private $disponivel;

    /**
     * Gets and Sets
     */


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this -> titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAutor(){
        return $this -> autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getCdd(){
        return $this -> cdd;
    }

    public function setCdd($cdd){
        $this->cdd = $cdd;
    }

    public function getDataPublicacao(){
        return $this -> dataPublicacao;
    }

    public function setDataPublicacao($dataPublicacao){
        $this->dataPublicacao = $dataPublicacao;
    }

    public function getEditora(){
        return $this -> editora;
    }

    public function setEditora($editora){
        $this->editora = $editora;
    }

    public function getLocal(){
        return $this -> local;
    }

    public function setLocal($local){
        $this->local = $local;
    }
    
    public function getEstante(){
        return $this -> estante;
    }

    public function setEstante($estante){
        $this->estante = $estante;
    }
    
    public function getDisponivel(){
        return $this ->disponivel;
    }
    
    public function setDisponivel($disponivel){
        $this -> disponivel = $disponivel;
    }
}
