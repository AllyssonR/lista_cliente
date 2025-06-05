<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>::Excluir</title>
</head>

<body>
  <div class="container">
    <?php
    $idCliente = $_GET["id_cliente"];
    require("./classecliente.php");
    $cliente = new cliente();
    $mensagem = "";
    if ($cliente->excluirCliente($idCliente)) {
      echo "<div class='alert alert-success'>Registro excluído com sucesso!</div>";
    } else {
      echo "<div class='alert alert-danger'>Falha ao excluir registro!</div>";
    }
    echo "<p>Clque <a href='./index.php'>para continuar</a></p>";
    ?>
  </div>
</body>

</html>
