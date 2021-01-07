<?php

// require __DIR__ .'/../../vendor/autoload.php';

namespace Source\Models;
use Source\Database\Connect;

class FilaDeEsperaDao
{

    public function create(FilaDeEspera $f){

        $sqlEmp = 'SELECT * FROM emprestimos WHERE id_aluno_fk = ? AND id_livro_fk = ?';
        $stmt2 = Connect::getInstance()->prepare($sqlEmp);
        $stmt2->bindValue(1, $f->getIdAlunoFk());
        $stmt2->bindValue(2, $f->getIdLivroFk());

        $stmt2 -> execute();
        $count2 = $stmt2->rowCount();

        if($count2 > 0){
            session_start();
            $_SESSION['typeMessage'] = 'warning';
            $_SESSION['mensagem'] = 'Este aluno está com o livro em questão !';
            header('Location:../Pages/FilaDeEspera.php');
        }else{

        $sql = 'INSERT INTO fila_de_espera (id_aluno_fk, id_livro_fk)
        SELECT * FROM (SELECT ? AS idAluno, ? AS idLivro) AS tmp
        WHERE NOT EXISTS (
            SELECT id_aluno_fk, id_livro_fk FROM fila_de_espera WHERE id_aluno_fk = ? AND id_livro_fk = ?
        ) LIMIT 1';

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1, $f->getIdAlunoFk());
        $stmt->bindValue(2, $f->getIdLivroFk());
        $stmt->bindValue(3, $f->getIdAlunoFk());
        $stmt->bindValue(4, $f->getIdLivroFk());
        
        $stmt -> execute();
        $count = $stmt->rowCount();

        if($count == 0){
            session_start();
            $_SESSION['typeMessage'] = 'info';
            $_SESSION['mensagem'] = 'Aluno já está na fila de espera desse livro';
            header('Location:../Pages/FilaDeEspera.php');
        }else{
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Aluno Adicionado a fila de espera';
            header('Location:../Pages/FilaDeEspera.php');
            }
        }
  
    }


    public function read(){

        if(isset($_GET['id'])){
            $idFilaDeEspera = $_GET['id'];
            $sql = "SELECT 
            fila_de_espera.id_fila_de_espera,
            alunos.nome,
            alunos.serie,
            alunos.turma,
            livros.titulo,
            fila_de_espera.posicao
                
            FROM fila_de_espera 
                
            INNER JOIN livros ON fila_de_espera.id_livro_fk = livros.id_livro
            INNER JOIN alunos ON fila_de_espera.id_aluno_fk = alunos.id_aluno
            
            WHERE id_fila_de_espera = '$idFilaDeEspera'";
        
            $stmt = Connect::getInstance()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }

        }else{


        }
    }


    public function getLivro(){
             //    Funções pega apenas nome e id do livro 
            $stmtLivro = Connect::getInstance()->prepare("SELECT DISTINCT(livros.titulo), livros.id_livro
             FROM fila_de_espera 
             INNER JOIN livros ON fila_de_espera.id_livro_fk = livros.id_livro");

            $stmtLivro->execute();
            $resultLivro = $stmtLivro->fetchAll(\PDO::FETCH_ASSOC);
        
            return $resultLivro;

    }



    public function tudo($a){
  
    //  Funções pega todas as informações
            $sql = 'SELECT 
            livros.id_livro,
            livros.titulo,
            fila_de_espera.id_fila_de_espera,
            alunos.nome,
            alunos.serie,
            alunos.turma
            FROM fila_de_espera   
            INNER JOIN livros ON fila_de_espera.id_livro_fk = livros.id_livro
            INNER JOIN alunos ON fila_de_espera.id_aluno_fk = alunos.id_aluno
            WHERE livros.id_livro = ?';

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1,$a);
        $stmt->execute();
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultado;
         
    }

    public function delete($id){

        $sql = 'DELETE FROM fila_de_espera WHERE id_fila_de_espera = ?';
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(1,$id);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
        

        if($stmt -> execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Removido com sucesso';
            header('Location:../Pages/FilaDeEspera.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Deletar Aluno';
            header('Location:../Pages/FilaDeEspera.php');
        }

    }
}


