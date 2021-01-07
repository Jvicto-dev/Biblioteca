<?php

use Source\Models\Emprestimos;

require __DIR__ .'/../../vendor/autoload.php';
// use Source\Database\Connect;

@$user = $_POST['user'];
@$senha = $_POST['senha'];



if(empty($user) || empty($senha)){
    header('Loaction:../../index.php?=camposVazios');
}else{
    
$login = new \Source\Models\Login();
$login->setUser($user);
$login->setPassword($senha);

$loginDao = new \Source\Models\LoginDao();
$loginDao->logar($login);

}

/**
 * Cadastrar Livros
 *  */ 

if(isset($_POST['CadastrarLivro'])){
    
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $cdd = $_POST['cdd'];
    $dataPublicacao = $_POST['dataPublicacao'];
    $editora = $_POST['editora'];
    $local =$_POST['local'];
    $estante = $_POST['estante'];

    $book = new \Source\Models\Books();
    $book -> setTitulo($titulo);
    $book ->setAutor($autor);
    $book -> setCdd($cdd);
    $book -> setDataPublicacao($dataPublicacao);
    $book -> setEditora($editora);
    $book -> setLocal($local);
    $book -> setEstante($estante);
    $book -> setDisponivel("Sim");

    $bookDao = new Source\Models\BookDao();
    $bookDao->create($book);

}


/** 
 * Editar Livros
 * */ 


if(isset($_POST['EditarLivro'])){

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $cdd = $_POST['cdd'];
    $dataPublicacao = $_POST['dataPublicacao'];
    $editora = $_POST['editora'];
    $local = $_POST['local'];
    $estante = $_POST['estante'];
    $disponivel = $_POST['disponivel'];

    $id = $_POST['id'];

    $book = new \Source\Models\Books();
    $book -> setTitulo($titulo);
    $book ->setAutor($autor);
    $book -> setCdd($cdd);
    $book -> setDataPublicacao($dataPublicacao);
    $book -> setEditora($editora);
    $book -> setLocal($local);
    $book -> setEstante($estante);
    $book -> setDisponivel($disponivel);
    $book -> setId($id);

    $bookDao = new Source\Models\BookDao();
    $bookDao->update($book);
}


/** 
 * Deletar Livros
 * */ 


if(isset($_GET['deletIdLivro'])){
    $idBook = $_GET['deletIdLivro'];
    $bookDao = new Source\Models\BookDao();
    $bookDao->delete($idBook);
}





if(isset($_POST['NovoEmprestimo'])){
    date_default_timezone_set('America/Sao_Paulo');
    $idAlunoFk = $_POST['idAlunoFk'];
    $idLivroFk = $_POST['idLivroFk'];

    $dateNow = new DateTime('now');
    $dataEmprestimo = $dateNow->format('d/m/Y');

    $dataDevolucao = $_POST['dataDevolucao'];

    $emprestimos = new \Source\Models\Emprestimos();
    $emprestimos->setIdAlunoFk($idAlunoFk);
    $emprestimos->setIdLivroFk($idLivroFk);
    $emprestimos->setDataEmprestimo($dataEmprestimo);
    $emprestimos->setDataDevolucao($dataDevolucao);

    $emprestimoDao = new \Source\Models\EmprestimosDao();
    $emprestimoDao->create($emprestimos);


}



if(isset($_POST['EditarEmprestimo'])){

    
    $idAluno = $_POST['idAluno']; // id do aluno
    $idLivro = $_POST['idLivro']; // id do novo livro que ele pegou
    $oldIdLivro = $_POST['oldIdLivro']; // isso é uma exceção
    $dataDevolucao = $_POST['dataDevolucao'];
    $idEmprestimo = $_POST['idEmprestimo']; 
   
    $emprestimos = new \Source\Models\Emprestimos();
    $emprestimos->setIdAlunoFk($idAluno);
    $emprestimos->setIdLivroFk($idLivro);
    $emprestimos->setOldIdLivro($oldIdLivro);
    $emprestimos->setDataDevolucao($dataDevolucao);

    $emprestimos->setIdEmprestimo($idEmprestimo);

    $emprestimoDao = new \Source\Models\EmprestimosDao();
    $emprestimoDao->update($emprestimos);
}





if(isset($_GET['Devolucao']) && isset($_GET['idLivro'])){
    $idLivro = $_GET['idLivro'];
    $idDevolucao = $_GET['Devolucao'];
    $emprestimoDao = new Source\Models\EmprestimosDao();
    $emprestimoDao->devolucao($idDevolucao, $idLivro);
}




if(isset($_GET['removeFila'])){
    $idFilaDeEspera = $_GET['removeFila'];
    $filaDeEsperaDao = new Source\Models\FilaDeEsperaDao();
    $filaDeEsperaDao->delete($idFilaDeEspera);
}



if(isset($_GET['idAluno']) && isset($_GET['idLivro'])){
    
    $idAluno= $_GET['idAluno'];
    $idLivro= $_GET['idLivro'];

    $fila = new \Source\Models\FilaDeEspera();
    $fila->setIdAlunoFk($idAluno);
    $fila->setIdLivroFk($idLivro);
    
    $filaDeEsperaDao = new Source\Models\FilaDeEsperaDao();
    $filaDeEsperaDao->create($fila);
}



