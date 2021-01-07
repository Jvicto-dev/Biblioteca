<?php

namespace Source\Models;

class Emprestimos
{   
    private $oldIdLivro;
    private $idEmprestimo;
    private $idAlunoFk;
    private $idLivroFk;
    private $dataEmprestimo;
    private $dataDevolucao;

    /**
     * a função 'oldIdLivro' é uma exeção, pois eu tenho de pegar o 
     * antigo id do livro que o aluno estava para pode dar update no
     * meu banco de dados, o livro antigo estava não disponivel, 
     * agora ele esta disponivel pois o aluno trocou o livro, então,
     * ele(antigo livro que o aluno estava) automaticamente tem que
     *  ficar disponivel após a troca.
     *  */ 

    public function getOldIdLivro(){
        return $this->oldIdLivro;
    }

    public function setOldIdLivro($oldIdLivro){
        $this->oldIdLivro = $oldIdLivro;
    }

    public function getIdEmprestimo(){
        return $this->idEmprestimo;
    }

    public function setIdEmprestimo($idEmprestimo){
        $this->idEmprestimo = $idEmprestimo;
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

    public function getDataEmprestimo(){
        return $this->dataEmprestimo;
    }

    public function setDataEmprestimo($dataEmprestimo){
        $this->dataEmprestimo = $dataEmprestimo;
    }

    public function getDataDevolucao(){
        return $this->dataDevolucao;
    }

    public function setDataDevolucao($dataDevolucao){
        $this->dataDevolucao = $dataDevolucao;
    }

}
