<?php

require __DIR__ .'/../../vendor/autoload.php';




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

?>