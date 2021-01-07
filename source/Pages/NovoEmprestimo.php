<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
}else{
   
}


require __DIR__ .'/../../vendor/autoload.php';
use Source\Models\BodyHtml;
use Source\Models\Messages;
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
    <h1 class="display-4">Novo Emprestimo de Livros</h1>
  </div>
</div>

<!-- Logica para colocar na fila de espera -->

<script type="text/javascript">
    var a;
    // var l;
    function pegaIdAluno(idAluno){
      a = idAluno.value;

     return a;
    }
    function mostraAlerta(elemento)
    {
      var str = elemento.value;
      var arr = str.split("|");

      if(arr[1] === "Não"){
        AdicionarFilaDeEspera(a, arr[0]);  
      }
      
    }
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">

			<form method="post" action="../Actions/Actions.php">
        <div class="form-group row">
        
        <label>Buscar por Aluno</label>
          <select  required  onchange="javascript:pegaIdAluno(this);" id="basic" name="idAlunoFk" class="selectpicker show-tick form-control" data-live-search="true">
            <option selected disabled >Buscar Por Aluno</option>
           
            <?php
                      foreach ($alunoDao ->read() as $a) {
              ?>

                <option value="<?= $a['id_aluno']; ?>" data-subtext="<?= $a['serie']; ?>ª série turma <?= $a['turma']; ?>"><?= $a['nome']; ?></option>
              
            <?php } ?>

          </select>
    
        </div>


          <br>



        <div class="form-group row">
        
        <label>Buscar por Livros</label>
          <select  required  onchange="javascript:mostraAlerta(this);" id="basic" name="idLivroFk" class="selectpicker show-tick form-control" data-live-search="true">
            <option selected disabled >Buscar Por Livro</option>
           
            <?php
            $aux = 0;
                      foreach ($booksDao ->read() as $b) {
                        if($b['disponivel'] == "Não"){
                         
                          
                        }else{
                          echo "esta disponivel";
                        }
                       

                        
            ?>

                <option data-subtext="Disponivel: <?= $b['disponivel']; ?>" value="<?= $b['id_livro']; ?>|<?= $b['disponivel']; ?>"><?= $b['titulo']; ?></option>
              
               
            <?php $aux++; } ?>
            
          </select>
    
        </div>




                        <br>








        <label class=" control-label">Data de Devolução</label>
             
             <div class="input-group date">
               <input type="text"  required  class="form-control" name="dataDevolucao" id="exemplo" placeholder="Data">
               <div class="input-group-addon">
                 <span class="glyphicon glyphicon-th"></span>
               </div>
             </div>

          <br>
              
          <button type="Submit" name="NovoEmprestimo" class="btn btn-outline-primary">Cadastrar</button>

      </form>
      



<hr>  



<br>
<hr>
<hr>


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

<?php

      BodyHtml::footer();
      Messages::Mensagens();

?>