<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
  }

require __DIR__ .'/../../vendor/autoload.php';
use Source\Models\BodyHtml;
use Source\Models\Messages;

$alunoDao = new Source\Models\AlunoDao();

?>

<!doctype html>
<html lang="Pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Alunos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Srcs/Plugins/Bootstrap/Css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
    <!-- Sweetalert JS -->
    <script src="../Srcs/Plugins/Sweetalert/Js/sweetalert2.all.min.js"></script>

    <!-- Sweetalert CSS -->
    <script src="../Srcs/Plugins/Sweetalert/Css/sweetalert2.min.css"></script>


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
        <a class="nav-link" href="Inicial.php">Voltar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="#">Livros</a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="#">Alunos</a> -->
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
    <h1 class="display-4">Alunos</h1>
    <p class="lead">Aqui você têm as informações dos Alunos</p>
  </div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
		</div>
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
     <a href="AdicionarAlunos.php"><button type="button" class="btn btn-outline-success">Adicionar Alunos</button></a>
		</div>
	</div>
</div>

<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Ações</th>
                    
                </tr>
            </thead>
                <?php
                    foreach ($alunoDao ->read() as $a) {
                ?>
            <tbody>
                <tr>
                    <th scope = "row"><?= $a['nome']; ?></th>
                    <td><?= $a['rua']; ?></td>
                    <td><?= $a['serie']; ?></td>
                    <td><?= $a['turma']; ?></td>
                   
                    <td>

                      <a href="../Pages/EditarAlunos.php?idAluno= <?= $a['id_aluno']; ?> ">
                        <button type="button" class="btn btn-outline-primary">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>
                        </button>
                      </a>
                      
                      <a href="#">
                        <button onclick="DeletarAluno(<?= $a['id_aluno']; ?>)" type="button" class="btn btn-outline-danger">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                        </button>
                      </a>

                    </td>
                </tr>
            </tbody>
                    <?php } ?>
            </table>
		</div>
	</div>
</div>

<br><br><br><br><br><br><br><br><br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="../Srcs/Plugins/Jquery/Js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../Srcs/Plugins/Bootstrap/Js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../Srcs/Plugins/Bootstrap/Js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   
  </body>
</html>

<?php

      BodyHtml::footer();
      Messages::Mensagens();

?>

