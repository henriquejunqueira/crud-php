<?php 
  $server = "localhost";
  $user = "henrique";
  $pass = "slipknot1994";
  $bd = "empresa";

  if($conn = mysqli_connect($server, $user, $pass, $bd)){
    // echo "Conectado!";
  }else{
    echo "Erro!";
  }

  function mensagem($texto, $tipo){
    echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
  }

  function mostra_data($data){
    $d = explode('-', $data);
    $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
    return $escreve;
  }

  function mover_foto($vetor_foto){
    if(($vetor_foto['error'] == UPLOAD_ERR_OK) and ($vetor_foto['size'] <= 500000)){
      $nome_arquivo = date('Ymdhms') . ".jpg";
      $destino = "img/" . $nome_arquivo;

      if(move_uploaded_file($vetor_foto['tmp_name'], $destino)){

        return $nome_arquivo;
      }else{
        return "Erro ao mover o arquivo.";
      }

    }else{
      return "Erro no upload do arquivo: " . $vetor_foto['error'];
    }
  }
?>