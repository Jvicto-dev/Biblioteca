<?php

namespace Source\Models;
use Source\Database\Connect;

class AlunoDao
{
    public function create(Alunos $a){
        $sql = 'INSERT INTO alunos (nome, rua, numero, cidade, bairro, estado, cep, turma, serie) VALUES (?,?,?,?,?,?,?,?,?)';

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getRua());
        $stmt->bindValue(3, $a->getNumero());
        $stmt->bindValue(4, $a->getCidade());
        $stmt->bindValue(5, $a->getBairro());
        $stmt->bindValue(6, $a->getEstado());
        $stmt->bindValue(7, $a->getCep());
        $stmt->bindValue(8, $a->getTurma());
        $stmt->bindValue(9, $a->getSerie());
        
        
        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Aluno cadastrado com sucesso';
            header('Location:../Pages/Alunos.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Cadastrar Aluno';
            header('Location:../Pages/Alunos.php');
        }

    }

    public function read(){
    
        if(isset($_GET['idAluno'])){
            $idAluno = $_GET['idAluno'];
            $sql = "SELECT * FROM alunos WHERE id_aluno = '$idAluno'";
        
            $stmt = Connect::getInstance()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }

        }else{

            $sql = 'SELECT * FROM alunos ORDER BY nome';
        
            $stmt = Connect::getInstance()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }
        }

    }

    public function update(Alunos $a){

        $sql = 'UPDATE alunos SET 
        nome = ?,
        rua = ?, 
        numero = ?,
        cidade = ?,
        bairro = ?,
        estado = ?,
        cep = ?,
        turma = ?,
        serie = ?
        

          WHERE id_aluno = ?';

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getRua());
        $stmt->bindValue(3, $a->getNumero());
        $stmt->bindValue(4, $a->getCidade());
        $stmt->bindValue(5, $a->getBairro());
        $stmt->bindValue(6, $a->getEstado());
        $stmt->bindValue(7, $a->getCep());
        $stmt->bindValue(8, $a->getTurma());
        $stmt->bindValue(9, $a->getSerie());

        $stmt->bindValue(10, $a->getIdAluno());

        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Aluno Editado com Sucesso';
            header('Location:../Pages/Alunos.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Editar Aluno';
            header('Location:../Pages/Alunos.php');
        }  

    }

    public function delete($id){

        $sql = 'DELETE FROM alunos WHERE id_aluno = ?';
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1,$id);

        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Aluno Deletado com Sucesso';
            header('Location:../Pages/Alunos.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Deletar Aluno';
            header('Location:../Pages/Alunos.php');
        }

    }
}

