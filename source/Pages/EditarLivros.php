<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
}else{
   
}


require __DIR__ .'/../../vendor/autoload.php';

$booksDao = new Source\Models\BookDao();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Editar Livros</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Srcs/Plugins/Bootstrap/Css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Js do Bootstrap -->
    <script src="../Srcs/Plugins/Jquery/Js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../Srcs/Plugins/Bootstrap/Js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../Srcs/Plugins/Bootstrap/Js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Css do Date-Picker -->
    <link rel="stylesheet" href="../Srcs/Plugins/Date-Picker/css/bootstrap-datepicker.css">

    <!-- Js do Date Picker -->
    <script src="../Srcs/Plugins/Date-Picker/js/bootstrap-datepicker.min.js"></script>
    <script src="../Srcs/Plugins/Date-Picker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
      
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
        <a class="nav-link" href="Livros.php">Voltar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="Livros.php">Livros</a> -->
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
    <h1 class="display-4">Editar Livros</h1>
    
  </div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">

			<form method="post" action="../Actions/Actions.php">

            <?php
                    foreach ($booksDao ->read() as $b) {
            ?>

        <input type="hidden" name="id" value="<?= $b['id_livro']; ?>">

            <label>Titulo</label>
            <input class="form-control" value = "<?= $b['titulo']; ?>" name='titulo' type="text" placeholder="Titulo"><br>
            <label>Autor</label>
            <input class="form-control" value = "<?= $b['autor']; ?>" name='autor' type="text" placeholder="Autor"><br>
            <label>Cdd</label>
            <input class="form-control" value = "<?= $b['cdd']; ?>" name='cdd' type="text" placeholder="Cdd" ><br>
            


            <label class=" control-label">Data</label>
             
                <div class="input-group date">
                  <input type="text" class="form-control" value = "<?= $b['data_publicacao']; ?>" name="dataPublicacao" id="exemplo" placeholder="Data">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
				  	 

              <br>
            
            <label>Editora</label>
            <input class="form-control" value = "<?= $b['editora']; ?>" name='editora' type="text" placeholder="Editora"><br>
            <label>Local</label>
            <input class="form-control" value = "<?= $b['local']; ?>" name='local' type="text" placeholder="Local"><br>
            <label>Estante</label>
            <input class="form-control" value = "<?= $b['estante']; ?>" name='estante' type="text" placeholder="Estante"><br>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Disponivel</label>
                    <select class="form-control" name = "disponivel" id = "exampleFormControlSelect1">
                        <option value = "<?= $b['disponivel']; ?>">Atualmente <?= $b['disponivel']; ?></option>
                        <option value = "Sim">Sim</option>
                        <option value = "Não">Não</option>
                    </select>
            </div>

          <br>
            <button type="Submit" name="EditarLivro" class="btn btn-outline-primary">Editar</button>
                    <?php } ?>
			</form>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<br><br><br>


    <script type="text/javascript">
          $('#exemplo').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR"
          });
		</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    
   
    </body>
</html>

