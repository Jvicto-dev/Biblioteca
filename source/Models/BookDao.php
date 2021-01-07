<?php

namespace Source\Models;
use Source\Database\Connect;

class BookDao{
    public function create(Books $b){
        $sql = 'INSERT INTO livros (titulo, autor, cdd, data_publicacao, editora, local, estante, disponivel) VALUES (?,?,?,?,?,?,?,?)';

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1, $b->getTitulo());
        $stmt->bindValue(2, $b->getAutor());
        $stmt->bindValue(3, $b->getCdd());
        $stmt->bindValue(4, $b->getDataPublicacao());
        $stmt->bindValue(5, $b->getEditora());
        $stmt->bindValue(6, $b->getLocal());
        $stmt->bindValue(7, $b->getEstante());
        $stmt->bindValue(8, $b->getDisponivel());
        
        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Livro cadastrado com sucesso';
            header('Location:../Pages/Livros.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Cadastrar Livro';
            header('Location:../Pages/Livros.php');
        }

    }

    public function read(){
    
        if(isset($_GET['idLivro'])){
            $idBook = $_GET['idLivro'];
            $sql = "SELECT * FROM livros WHERE id_livro = '$idBook'";
        
            $stmt = Connect::getInstance()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }

        }else{

            $sql = 'SELECT * FROM livros ORDER BY titulo';
        
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

    public function update(Books $b){

        $sql = 'UPDATE livros SET 
        titulo = ?,
        autor = ?, 
        cdd = ?,
        data_publicacao = ?,
        editora = ?, 
        local = ?,
        estante = ?,
        disponivel = ?

          WHERE id_livro = ?';

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1, $b->getTitulo());
        $stmt->bindValue(2, $b->getAutor());
        $stmt->bindValue(3, $b->getCdd());
        $stmt->bindValue(4, $b->getDataPublicacao());
        $stmt->bindValue(5, $b->getEditora());
        $stmt->bindValue(6, $b->getLocal());
        $stmt->bindValue(7, $b->getEstante());
        $stmt->bindValue(8, $b->getDisponivel());
        $stmt->bindValue(9, $b->getId());

        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Livro Editado com Sucesso';
            header('Location:../Pages/Livros.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Editar Livro';
            header('Location:../Pages/Livros.php');
        }

       

    }

    public function delete($id){

        $sql = 'DELETE FROM livros WHERE id_livro = ?';
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1,$id);

        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Livro Deletado com Sucesso';
            header('Location:../Pages/Livros.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Deletar Livro';
            header('Location:../Pages/Livros.php');
        }

    }
}



?>