<?php

session_start();

if(!(isset($_SESSION['user']))){
    header('Location:../../index.php');
}

require __DIR__ .'/../../vendor/autoload.php';
use Source\Models\BodyHtml;
use Source\Models\Messages;
$filaDeEsperaDao = new \Source\Models\FilaDeEsperaDao;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Fila de Espera</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Srcs/Plugins/SearchPicker/dist/css/bootstrap-select.css">

    <link rel="stylesheet" href="../Srcs/Plugins/Date-Picker/css/bootstrap-datepicker.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Plugins do date Picker -->
    <script src="../Srcs/Plugins/Date-Picker/js/bootstrap-datepicker.min.js"></script>
    <script src="../Srcs/Plugins/Date-Picker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
   
    <!-- SwetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  
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
    <h1 class="display-4">Fila de espera</h1>
  </div>
</div>





<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">




<hr>








<?php 


// foreach ($filaDeEsperaDao->getLivro() as $livro) {
  
//   echo $livro['titulo']."<br><br>";

//   foreach ($filaDeEsperaDao->tudo($livro['id_livro']) as $res) {
//     echo $res['nome']."<br></br>";
     
//   }

// }

?>








<br>
<hr>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
   
		</div>
	</div>
</div>










<?php 

foreach ($filaDeEsperaDao->getLivro() as $livro) {

?>  

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

</table>

<table class="table">

  <thead class="thead-light">
    <tr>
      <th colspan="3"><?= $livro['titulo']; ?></th>
      <th></th>
    </tr>
  </thead>

  <tbody>
<?php 
$x = 0;

foreach ($filaDeEsperaDao->tudo($livro['id_livro']) as $res) {
$x++;
?>

    <tr>
      <th scope="row"><?= $res['nome']; ?></th>
      <td ><?= $x;?>º</td>
      <td>
        <a href="#">
            <button onclick="RetirarDaFila(<?= $res['id_fila_de_espera']; ?>)" type="button" class="btn btn-outline-danger">
              <svg width="0.9em" height="0.9em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </button>
        </a>
      </td>
      <td></td>
      <?php  } ?>
    </tr>
   
  </tbody>

</table>

<?php  } ?>

















<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="../Srcs/Plugins/SearchPicker/dist/js/bootstrap-select.js"></script>

<script>
function createOptions(number) {
  var options = [], _options;

  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);
  }

  _options = options.join('');
  
  $('#number')[0].innerHTML = _options;
  $('#number-multiple')[0].innerHTML = _options;

  $('#number2')[0].innerHTML = _options;
  $('#number2-multiple')[0].innerHTML = _options;
}

var mySelect = $('#first-disabled2');

createOptions(4000);

$('#special').on('click', function () {
  mySelect.find('option:selected').prop('disabled', true);
  mySelect.selectpicker('refresh');
});

$('#special2').on('click', function () {
  mySelect.find('option:disabled').prop('disabled', false);
  mySelect.selectpicker('refresh');
});

$('#basic2').selectpicker({
  liveSearch: true,
  maxOptions: 1
});
</script>



<script type = "text/javascript">
          $('#exemplo').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR"
          });
</script>


</body>
</html>


<?php

      BodyHtml::footer();
      Messages::Mensagens();

?>