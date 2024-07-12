<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/estilo.css" />

    <title>Pesquisar</title>
  </head>
  <body>

    <?php
      $pesquisa = $_POST['busca'] ?? '';

      include "conexao.php";

      $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

      $dados = mysqli_query($conn, $sql);

      ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="caixa-titulo">
            <h1>Pesquisar Pessoas</h1>
            <a href="./index.php" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i> Voltar para o início</a>
          </div>
          <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="./pesquisa.php" method="POST">
              <input class="form-control mr-sm-2" type="search" placeholder="Digite o nome da pessoa..." aria-label="Search" name="busca" autofocus>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
          </nav>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Funções</th>
              </tr>
            </thead>
            <tbody>
            <?php

              while($linha = mysqli_fetch_assoc($dados)){
                $cod_pessoa = $linha['cod_pessoa'];
                $foto = $linha['foto'];
                $nome = $linha['nome'];
                $endereco = $linha['endereco'];
                $telefone = $linha['telefone'];
                $email = $linha['email'];
                $data_nascimento = $linha['data_nascimento'];
                $data_nascimento = mostra_data($data_nascimento);

                echo "<tr>
                        <th><img src='img/$foto' class='lista_foto' /></th>
                        <th scope='row'>$nome</th>
                        <td>$endereco</td>
                        <td>$telefone</td>
                        <td>$email</td>
                        <td>$data_nascimento</td>
                        <td width=200px>
                          <a href='./cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'><i class='bi bi-pencil-square'></i> Editar</a>
                          <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' onClick=" . '"' . "pegar_dados('$cod_pessoa', '$nome')" . '"' . "><i class='bi bi-trash3'></i> Excluir</a>
                        </td>
                      </tr>";
                
              }
            ?>
            <!-- onClick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . " -->
             <!-- onClick=`pegar_dados($cod_pessoa, '$nome')` -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="excluir_script.php" method="POST">
              <p>Deseja realmente excluir <strong id="nome_pessoa">Nome da pessoa</strong>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
              <input type="hidden" name="id" id="cod_pessoa" value="">
              <input type="hidden" name="nome" id="nome_pessoa_1" value="">
              <input type="submit" class="btn btn-danger" value="Sim" />
            </div>
          </form>
        </div>
      </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./js/script.js"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>