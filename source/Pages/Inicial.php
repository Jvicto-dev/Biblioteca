<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
}else{
   
}

require __DIR__ .'/../../vendor/autoload.php';
use Source\Models\BodyHtml;
use Source\Models\Messages;

$emprestimosDao = new \Source\Models\EmprestimosDao();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tela inicial</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Livros.php">Livros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Alunos.php">Alunos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="FilaDeEspera.php">Fila de Espera</a>
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
    <h1 class="display-4">Emprestimos</h1>
    <p class="lead">Aqui Você pode ver os alunos que pediram um livro emprestado, qual livro e quando ele deve ser devolvido.</p>
  </div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
		</div>
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
     <a href="NovoEmprestimo.php"><button type="button" class="btn btn-outline-success">Novo Emprestimo</button></a>
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
                    <th scope="col">Nome do Aluno</th>
                    
                    <th scope="col">Livro</th>
                    <th scope="col">Data do emprestimo</th>
                    <th scope="col">Data de devolução</th>
                    <th scope="col">Estimativa</th>
                    <th scope="col"></th>
                </tr>
            </thead>
                <?php
                    foreach ($emprestimosDao ->read() as $emp) {
                ?>
            <tbody>
                <tr>
                    <th scope="row">
                      <h5>
                        <a onclick="infoAluno('<?= $emp['nome']; ?>','<?= $emp['rua']; ?>','<?= $emp['numero']; ?>','<?= $emp['cidade']; ?>','<?= $emp['bairro']; ?>','<?= $emp['estado']; ?>','<?= $emp['cep']; ?>','<?= $emp['serie']; ?>','<?= $emp['turma']; ?>')" href = "#" class="badge badge-info">
                          <?= $emp['nome']; ?>
                        </a>
                      </h5>
                    </th>

                    <td>
                      <h5>
                         <a onclick="infoLivro('<?= $emp['titulo']; ?>','<?= $emp['autor']; ?>','<?= $emp['cdd']; ?>','<?= $emp['data_publicacao']; ?>','<?= $emp['editora']; ?>','<?= $emp['local']; ?>','<?= $emp['estante']; ?>')" href="#" class="badge badge-info">
                           <?= $emp['titulo']; ?>
                        </a>
                      </h5>
                    </td>
                    <td><?= $emp['data_emprestimo']; ?></td>
                    <td><?= $emp['data_devolucao']; ?></td>

                      <?php
                        @define("DATE","d/m/Y");

                        date_default_timezone_set('America/Sao_Paulo');
                       
                        $dateNow = new DateTime('now');
                        $formated = DateTime::createFromFormat(DATE, $emp['data_devolucao']);
                        $diff = $dateNow->diff($formated);

                        if($diff->invert){
                      ?>
                    <td>
                      <h5>
                        <span class="badge badge-pill badge-danger">
                          <?= "Passaram ".$diff->days." dia(s)" ?>
                        </span>
                      </h5>
                    </td>

                        <?php }else if($diff->days < 3){?>
                    <td>
                      <h5>
                        <span class="badge badge-pill badge-warning">
                          <?= "Faltam ".$diff->days." dia(s)" ?>
                        </span>
                      </h5>
                    </td>

                        <?php }else{ ?>

                          
                    <td>
                      <h5>
                        <span class="badge badge-pill badge-success">
                          <?= "Faltam ".$diff->days." dia(s)" ?>
                        </span>
                      </h5>
                    </td>

                        <?php } ?>


                    <td>

                    <a href="../Pages/EditarEmprestimos.php?id= <?= $emp['id_emprestimo']; ?> ">
                        <button type="button" class="btn btn-outline-primary">
                          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>
                        </button>
                    </a>

                    <button onclick="Devolucao(<?= $emp['id_emprestimo']; ?>,<?= $emp['id_livro']; ?>)" type="button" class="btn btn-outline-success">
                      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                      </svg>
                    </button>
                      
                    </td>
                </tr>
            </tbody>
                    <?php } ?>
            </table>
		</div>
	</div>
</div>




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
