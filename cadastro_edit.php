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

    <title>Alteração de Cadastro</title>
  </head>
  <body>

    <?php

      include "conexao.php";

      $id = $_GET['id'] ?? '';
      $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

      $dados = mysqli_query($conn, $sql);

      $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="caixa-titulo">
            <h1>Alteração de Cadastro</h1>
            <a href="./index.php" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i> Voltar para o início</a>
          </div>
          <form action="edit_script.php" method="POST">
            <div class="form-group">
              <label for="nome">Nome Completo</label>
              <input type="text" class="form-control" name="nome" placeholder="Digite o nome completo..." required value="<?php echo $linha['nome']; ?>" />
            </div>
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" name="endereco" placeholder="Digite o endereço..." value="<?php echo $linha['endereco']; ?>" />
            </div>
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" name="telefone" placeholder="Digite o telefone..." value="<?php echo $linha['telefone']; ?>" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Digite o email..." value="<?php echo $linha['email']; ?>" />
            </div>
            <div class="form-group">
              <label for="data_nascimento">data de Nascimento</label>
              <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>" />
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Salvar Alterações" />
              <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa'] ?>" />
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

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