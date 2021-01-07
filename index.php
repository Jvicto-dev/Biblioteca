




<?php



require __DIR__ .'/vendor/autoload.php';

$alunoDao = new Source\Models\AlunoDao();
$booksDao = new Source\Models\BookDao();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Biblioteca</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="source/Srcs/Plugins/SearchPicker/dist/css/bootstrap-select.css">

    <link rel="stylesheet" href="source/Srcs/Plugins/Date-Picker/css/bootstrap-datepicker.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


  
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
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="#">Link</a> -->
      </li>
      <li class="nav-item dropdown">
        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a> -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="#">Action</a> -->
          <!-- <a class="dropdown-item" href="#">Another action</a> -->
          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
      </li>
    </ul>
    
     
      <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
  Login
</button>
   
  </div>
</nav>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form method="post" action="source/Actions/Actions.php">
            <div class="form-group">Usuário</label>
            <input class="form-control" type="text" name="user" placeholder="Usuario">
                <small id="emailHelp" class="form-text text-muted">Informe o usuario para acessar o sistema</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="senha" placeholder = "Sua Senha" class="form-control" id="exampleInputPassword1">
            </div>
            
          
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="Submit" class="btn btn-primary">Entrar</button>
        
        </form>
    
        </div>
    </div>
  </div>
</div>




<hr>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Buscar por um Livro</h1>
  </div>
</div>





<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<form method="post" action="#">
        <div class="form-group row">
        <label>Buscar por Livros</label>
          <select id="basic" name="idLivroFk" class="selectpicker show-tick form-control" data-live-search="true">
            <option selected disabled >Buscar Por Livro</option>
            <?php
                      foreach ($booksDao ->read() as $b) {
            ?>
                <option data-subtext="Disponivel: <?= $b['disponivel']; ?>" value="<?= $b['id_livro']; ?>"><?= $b['titulo']; ?></option>
            <?php } ?> 
          </select>
        </div>
      </form>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="source/Srcs/Plugins/SearchPicker/dist/js/bootstrap-select.js"></script>

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
