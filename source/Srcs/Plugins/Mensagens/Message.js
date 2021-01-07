
    function Message(mensagem, tipo){
    
      Swal.fire(
              mensagem,
              '',
              tipo
            )

    }


    
    function DeletarLivro(a){

      Swal.fire({
        title: 'Tem certeza disso ?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, Deletar isso!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href="../Actions/Actions.php?deletIdLivro="+a    
        }
      })
}


function DeletarAluno(a){

  Swal.fire({
    title: 'Tem certeza disso ?',
    text: "Você não poderá reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, Deletar isso!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href="../Actions/ActionsAluno.php?deletIdAluno="+a    
    }
  })
}


function RetirarDaFila(a){

  Swal.fire({
    title: 'Tem certeza disso ?',
    text: "Você não poderá reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, Deletar isso!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href="../Actions/Actions.php?removeFila="+a    
    }
  })
}

function infoAluno(nome,rua,numero,cidade,bairro,estado,cep,serie,turma){
  Swal.fire({
  title: nome,
  text: rua ,
  html:
   cidade + " " + estado + " " + bairro + " " + '<br>'
   +rua +" Nº "+ numero + '<br>' 
   +"Cep: "+cep +'<br>' + '<br>' + " "+
    serie + 'ª serie turma ' + turma
  
})
}

function infoLivro(titulo,autor,cdd,data_publicacao,editora,local,estante){
      Swal.fire({
      title: titulo,
      text: 'endereco' ,
      html:
    '<b>Autor: </b>' + autor + '<br>' +
    '<b>Cdd: </b>' + cdd + '<br>' +
    '<b>Data da Publicação: </b>' + data_publicacao + '<br>' +
    '<b>Editora: </b>' +  editora + '<br>' +
    '<b>Local: </b>' + local + '<br>' +
    '<b>Estante: </b>' +  estante + '<br>' 
        
      
    })
}

function Devolucao(idDevolucao,idLivro){

  Swal.fire({
    title: 'O aluno esta devolvendo um livro ?',
    text: "Você não poderá reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href="../Actions/Actions.php?Devolucao="+idDevolucao+"&idLivro="+idLivro   
    }
  })
  }



  function AdicionarFilaDeEspera(idAluno,idLivro){

    Swal.fire({
      title: 'Este Livro não está Disponivel !',
      text: "Gostaria de adicionar o aluno: "+ idAluno +" a fila de espera ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href="../Actions/Actions.php?idAluno="+idAluno+"&idLivro="+idLivro
      }
    })
    }