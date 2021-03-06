<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
}else{
   
}

require __DIR__ .'/../../vendor/autoload.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Adicionar Alunos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Srcs/Plugins/Bootstrap/Css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Js do Bootstrap -->
    <script src="../Srcs/Plugins/Jquery/Js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../Srcs/Plugins/Bootstrap/Js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../Srcs/Plugins/Bootstrap/Js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Logica de buscar o cep e inserir nos campos -->
    <script src="../Srcs/Plugins/SearchCep/Js/buscaCep.js"></script>
   
   
  </head>
  <body>
    <!-- Menu -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Inicial.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
    
      <!-- Button trigger modal -->
      <a href="../Models/Sair.php">
        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
            Sair
        </button>
    </a> 
   
  </div>
</nav>




<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Adicionar Alunos</h1>
  </div>
</div>


<hr>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">

<form method="post" action="../Actions/ActionsAluno.php">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Nome do aluno</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Nome do Aluno" required name="nome">
    </div>   
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">Série</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Série" required name="serie">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Turma</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Turma" required name="turma">
  </div>
  </div>

<br>

<div class="form-row">
  <div class="form-group col-md-2">
    <label for="inputAddress">Cep</label>
    <input onblur="pesquisacep(this.value);" id="cep" type="text" class="form-control" id="inputAddress" placeholder="Cep" required name="cep">
  </div>
  <div class="form-group col-md-9">
      <label for="inputEmail4">Rua</label>
      <input type="text" class="form-control" id="rua" placeholder="Rua" required name="rua">
  </div>
  <div class="form-group col-md-1">
      <label for="inputEmail4">Numero</label>
      <input type="text" class="form-control" placeholder="Nº" required name="numero">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputCity">Bairro</label>
      <input type="text" class="form-control" id="bairro" placeholder="Bairro" required name="bairro">
    </div>

    <div class="form-group col-md-5">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="cidade" placeholder="Cidade" required name="cidade">
    </div>

    
    <div class="form-group col-md-2">
      <label for="inputZip">Estado</label>
      <input type="text" class="form-control" id="uf" placeholder="Estado" required name="estado">
    </div>

  </div>
  
  <button type="Submit" name="CadastrarAluno" class="btn btn-outline-primary">Cadastrar Aluno</button>

</form>

      </div>
		<div class="col-md-2">
		</div>
	</div>
</div>



<hr>	


      <br><br><br><br>

   
    </body>
</html>

