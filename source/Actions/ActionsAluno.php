<?php

require __DIR__ .'/../../vendor/autoload.php';

/**
 * Cadastrar Alunos
 *  */ 

if(isset($_POST['CadastrarAluno'])){

    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $turma = $_POST['turma'];
    $serie = $_POST['serie'];

    $alunos = new \Source\Models\Alunos();
    $alunos->setNome($nome);
    $alunos->setRua($rua);
    $alunos->setNumero($numero);
    $alunos->setCidade($cidade);
    $alunos->setBairro($bairro);
    $alunos->setEstado($estado);
    $alunos->setCep($cep);
    $alunos->setTurma($turma);
    $alunos->setSerie($serie);

    $alunoDao = new Source\Models\AlunoDao();
    $alunoDao->create($alunos);

}

/**
 * Editar Alunos
 */

if(isset($_POST['EditarAluno'])){

    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $turma = $_POST['turma'];
    $serie = $_POST['serie'];
    $id = $_POST['id'];
   
    $alunos = new \Source\Models\Alunos();
    $alunos -> setNome($nome);
    $alunos -> setRua($rua);
    $alunos -> setNumero($numero);
    $alunos -> setCidade($cidade);
    $alunos -> setBairro($bairro);
    $alunos -> setEstado($estado);
    $alunos -> setCep($cep);
    $alunos -> setTurma($turma);
    $alunos -> setSerie($serie);
    $alunos -> setIdAluno($id);
    $alunoDao = new Source\Models\AlunoDao();
    $alunoDao -> update($alunos);
}

/** 
 * Deletar Alunos
 * */ 

if(isset($_GET['deletIdAluno'])){
    $idAluno = $_GET['deletIdAluno'];
    $alunoDao = new Source\Models\AlunoDao();
    $alunoDao->delete($idAluno);
}