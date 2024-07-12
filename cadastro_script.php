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

    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <?php
          // Ativar exibição de erros diretamente no script
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);

          include "conexao.php";

          // Verifique se a conexão foi estabelecida
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // Escapando os dados de entrada
          $nome = mysqli_real_escape_string($conn, $_POST['nome']);
          $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
          $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento']);

          $foto = $_FILES['foto'];
          $nome_foto = mover_foto($foto);

          // Verificação se o upload foi bem-sucedido
          if ($nome_foto === "Erro ao mover o arquivo." || strpos($nome_foto, "Erro no upload do arquivo") !== false) {
            echo "<div class='alert alert-danger' role='alert'>$nome_foto</div>";
            exit;
          }

          $sql = "INSERT INTO `pessoas` (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) VALUES ('$nome', '$endereco', '$telefone', '$email', '$data_nascimento', '$nome_foto')";

          if(mysqli_query($conn, $sql)){
            echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto' />";
            mensagem("$nome cadastrado com sucesso!", "success");
          }else{
            mensagem("$nome NÃO cadastrado! Erro: " . mysqli_error($conn), "danger");
          }

          // Fechando a conexão
          mysqli_close($conn)
        ?>
        <hr>
        <div class="caixa-titulo">
          <a href="./cadastro.php" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i> Voltar</a>
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