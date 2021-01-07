<?php
// require __DIR__ .'/../../vendor/autoload.php';
namespace Source\Models;
use Source\Database\Connect;

class EmprestimosDao{

    public function create(Emprestimos $e){
        $sqlInsert = 'INSERT INTO emprestimos (id_aluno_fk, id_livro_fk, data_emprestimo, data_devolucao) VALUES (?,?,?,?)';

        $stmt = Connect::getInstance()->prepare($sqlInsert);
        $stmt->bindValue(1, $e->getIdAlunoFk());
        $stmt->bindValue(2, $e->getIdLivroFk());
        $stmt->bindValue(3, $e->getDataEmprestimo());
        $stmt->bindValue(4, $e->getDataDevolucao());

        $sqlUpdateBooks = 'UPDATE livros SET disponivel = ? WHERE id_livro = ?';
        
        $stmtBooks = Connect::getInstance()->prepare($sqlUpdateBooks);
        $stmtBooks->bindValue(1, "Não");
        $stmtBooks->bindValue(2, $e->getIdLivroFk());

        if($stmt -> execute() &&  $stmtBooks->execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Novo emprestimo cadastrado com sucesso';
            header('Location:../Pages/Inicial.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Cadastrar Emprestimo';
            header('Location:../Pages/Inicial.php');
        }

    }

    

    public function read(){

        if(isset($_GET['id'])){
            $idEmprestimo = $_GET['id'];
            $sql = "SELECT 
            emprestimos.id_emprestimo,
            alunos.id_aluno,
            alunos.nome,
            alunos.serie,
            alunos.turma,
            livros.id_livro,
            livros.titulo,
            livros.autor,
            livros.cdd,
            livros.data_publicacao,
            livros.editora,
            livros.local,
            livros.estante,
            emprestimos.data_emprestimo,
            emprestimos.data_devolucao 
                
            FROM emprestimos 
                
            INNER JOIN livros ON emprestimos.id_livro_fk = livros.id_livro
            INNER JOIN alunos ON emprestimos.id_aluno_fk = alunos.id_aluno 
            
            WHERE id_emprestimo = '$idEmprestimo'";
        
            $stmt = Connect::getInstance()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }

        }else{

        $sql = 'SELECT 
            emprestimos.id_emprestimo,
            alunos.id_aluno,
            alunos.nome,
            alunos.rua,
            alunos.numero,
            alunos.cidade,
            alunos.bairro,
            alunos.estado,
            alunos.cep,
            alunos.serie,
            alunos.turma,
            livros.id_livro,
            livros.titulo,
            livros.autor,
            livros.cdd,
            livros.data_publicacao,
            livros.editora,
            livros.local,
            livros.estante,
            emprestimos.data_emprestimo,
            emprestimos.data_devolucao 
                
            FROM emprestimos 
                
            INNER JOIN livros ON emprestimos.id_livro_fk = livros.id_livro
            INNER JOIN alunos ON emprestimos.id_aluno_fk = alunos.id_aluno';
        
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

    public function update(Emprestimos $e){

        $sql = 'UPDATE emprestimos SET 
        id_aluno_fk = ?,
        id_livro_fk = ?, 
        data_devolucao = ?
    

        WHERE id_emprestimo = ?';

        $stmt = Connect::getInstance()->prepare($sql);

        if($e->getIdLivroFk() == $e->getOldIdLivro()){
            
            $stmt->bindValue(1, $e->getIdAlunoFk());
            $stmt->bindValue(2, $e->getIdLivroFk());
            $stmt->bindValue(3, $e->getDataDevolucao());
            $stmt->bindValue(4, $e->getIdEmprestimo());

            if($stmt -> execute()){
                session_start();
                $_SESSION['typeMessage'] = 'success';
                $_SESSION['mensagem'] = 'Emprestimo Editado com Sucesso';
                header('Location:../Pages/Inicial.php');
            }else{
                $_SESSION['typeMessage'] = 'error';
                $_SESSION['mensagem'] = 'Erro ao Editar Emprestimo';
                header('Location:../Pages/Inicial.php');
            }

        }else{
            $sql = 'UPDATE emprestimos SET 
            id_aluno_fk = ?,
            id_livro_fk = ?, 
            data_devolucao = ?
            WHERE id_emprestimo = ?';

            $stmt = Connect::getInstance()->prepare($sql);

            $stmt->bindValue(1, $e->getIdAlunoFk());
            $stmt->bindValue(2, $e->getIdLivroFk());
            $stmt->bindValue(3, $e->getDataDevolucao());
            $stmt->bindValue(4, $e->getIdEmprestimo());
            



            // Sql
            $sqlLivro = 'UPDATE livros SET 
            disponivel = ?
            WHERE id_livro = ?';
            // Prepara
            $stmtLivro = Connect::getInstance()->prepare($sqlLivro);
            // Bindvalues
            $stmtLivro->bindValue(1, "Sim");
            $stmtLivro->bindValue(2, $e->getOldIdLivro());


            // Sql
            $sqlLivroOld = 'UPDATE livros SET 
            disponivel = ?
            WHERE id_livro = ?';
            // Prepara
            $stmtLivroOld = Connect::getInstance()->prepare($sqlLivroOld);
            // Bindvalues
            $stmtLivroOld->bindValue(1, "Não");
            $stmtLivroOld->bindValue(2, $e->getIdLivroFk());



            if($stmt -> execute() &&  $stmtLivro->execute() && $stmtLivroOld->execute()){
                session_start();
                $_SESSION['typeMessage'] = 'success';
                $_SESSION['mensagem'] = 'Emprestimo Editado com Sucesso';
                header('Location:../Pages/Inicial.php');
            }else{
                $_SESSION['typeMessage'] = 'error';
                $_SESSION['mensagem'] = 'Erro ao Editar Emprestimo';
                header('Location:../Pages/Inicial.php');
            }

        }


    }


    public function devolucao($idEmprestimo, $idLivro){
        $sqlDevolucao = 'DELETE FROM emprestimos WHERE id_emprestimo = ?';
        $stmtDevolucao = Connect::getInstance()->prepare($sqlDevolucao);
        $stmtDevolucao->bindValue(1,$idEmprestimo);

        $sqlLivro = 'UPDATE livros SET disponivel = ? WHERE id_livro = ?';
        $stmtLivro = Connect::getInstance()->prepare($sqlLivro);
        $stmtLivro->bindValue(1, "Sim");
        $stmtLivro->bindValue(2, $idLivro);
      
        if($stmtDevolucao -> execute() && $stmtLivro->execute()){
            session_start();
            $_SESSION['typeMessage'] = 'success';
            $_SESSION['mensagem'] = 'Livro devolvido com sucesso';
            header('Location:../Pages/Inicial.php');
        }else{
            $_SESSION['typeMessage'] = 'error';
            $_SESSION['mensagem'] = 'Erro ao Devolver Livro';
            header('Location:../Pages/Inicial.php');
        }
    }

    public function acountTimer($dataEntregaDB){

        define("DATE","d/m/Y");

            date_default_timezone_set('America/Sao_Paulo');
           
            $dateNow = new DateTime('now');
            $formated = DateTime::createFromFormat(DATE, $dataEntregaDB);
            $diff = $dateNow->diff($formated);

            return $diff;


    }
    
}



// $timer = new EmprestimosDao();


// echo '<pre>';

//  $y = $timer->acountTimer("22/09/2020");

//     if($y->invert){
//         echo "passou ".$y->days." dias";
//     }else{
//         echo "faltam ".$y->days." dias";
//     }


// echo '</pre>';




