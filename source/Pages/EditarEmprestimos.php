<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
}else{
   
}


require __DIR__ .'/../../vendor/autoload.php';

$emprestimosDao = new \Source\Models\EmprestimosDao();

$alunoDao = new Source\Models\AlunoDao();
$booksDao = new Source\Models\BookDao();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Novo Emprestimo</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../Srcs/Plugins/Bootstrap/Css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Js do Bootstrap -->
  <script src="../Srcs/Plugins/Jquery/Js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../Srcs/Plugins/Bootstrap/Js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="../Srcs/Plugins/Bootstrap/Js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <!-- Css do Select com busca -->
  <link rel="stylesheet" href="../Srcs/Plugins/SearchPicker/dist/css/bootstrap-select.css">

  <!-- Css do Date-Picker -->
  <link rel="stylesheet" href="../Srcs/Plugins/Date-Picker/css/bootstrap-datepicker.css">

  <!-- Js do Date Picker -->
  <script src="../Srcs/Plugins/Date-Picker/js/bootstrap-datepicker.min.js"></script>
  <script src="../Srcs/Plugins/Date-Picker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

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
    <h1 class="display-4">Editar Emprestimos</h1>
  </div>
</div>





<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">

<form method="post" action="../Actions/Actions.php">


        <?php
           foreach ($emprestimosDao ->read() as $emp) {
        ?>

        <input type="hidden" name="idEmprestimo" value="<?= $emp['id_emprestimo']; ?>">
           
        <?php }?>

        <div class="form-group row">
            <label>Buscar por Aluno</label>
            <select id="basic" name = "idAluno" class="selectpicker show-tick form-control" data-live-search="true">
                <?php
                        foreach ($emprestimosDao ->read() as $emp) {
                ?>
                    <option selected value="<?= $emp['id_aluno']; ?>" data-subtext="<?= $emp['serie']; ?>ª série turma <?= $emp['turma']; ?>"><?= $emp['nome']; ?></option>

                <?php } ?>
                <?php
                        foreach ($alunoDao ->read() as $a) {
                ?>
                    <option value="<?= $a['id_aluno']; ?>" data-subtext="<?= $a['serie']; ?>ª série turma <?= $a['turma']; ?>"><?= $a['nome']; ?></option>
                <?php } ?>
            </select>
        </div>
        <br>



        
        <div class="form-group row">
        
        <?php
           foreach ($emprestimosDao ->read() as $emp) {
        ?>

        <input type="hidden" name="oldIdLivro" value="<?= $emp['id_livro']; ?>">
           
        <?php }?>


        <label>Buscar por Livro</label>
          <select id="basic" name = "idLivro" value = "teste" class="selectpicker show-tick form-control" data-live-search="true">
            
           
            <?php
                      foreach ($emprestimosDao ->read() as $emp) {
              ?>

                <option selected value = "<?= $emp['id_livro']; ?>" ><?= $emp['titulo']; ?></option>
              
            <?php } ?>
                    

            <?php
                      foreach ($booksDao ->read() as $b) {
                        if($b['disponivel'] != 'Não'){
              ?>

                <option value = "<?= $b['id_livro']; ?>" ><?= $b['titulo']; ?></option>
              
            <?php }else{ ?>

              <option disabled value = "<?= $b['id_livro']; ?>" ><?= $b['titulo']; ?></option>

            <?php }} ?>
              
          </select>
    
        </div>



                        <br>




        <label class=" control-label">Data de Devolução</label>
             
             <div class="input-group date">
             <?php
                      foreach ($emprestimosDao ->read() as $emp) {
              ?>
               <input type="text" value = "<?= $emp['data_devolucao']; ?>" class="form-control" name="dataDevolucao" id="exemplo" placeholder="Data">
                      <?php } ?>
               <div class="input-group-addon">
                 <span class="glyphicon glyphicon-th"></span>
               </div>
             </div>

          <br>
              
          <button type="Submit" name="EditarEmprestimo" class="btn btn-outline-primary">Editar Emprestimo</button>

      </form>
      
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<!-- Js do Search Picker -->
<script src="../Srcs/Plugins/SearchPicker/dist/js/bundle.min.js"></script>
<script src="../Srcs/Plugins/SearchPicker/dist/js/bootstrap-select.js"></script>
<script src="../Srcs/Plugins/SearchPicker/dist/js/search.js"></script>

<!-- Js da lógica do date picker -->
<script type="text/JavaScript" src="../Srcs/Plugins/Date-Picker/js/date-datePicker.js"></script>


</body>
</html>
