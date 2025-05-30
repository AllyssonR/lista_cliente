<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salvar php</title>
</head>

<body>
  <div class="container">
    <?php
    //Recebe os dados enviados via GET
    $idCliente = $_GET["id_cliente"];
    $nome = $_GET["nome"];
    $endereco = $_GET["endereco"];
    $telefone = $_GET["telefone"];
    $cpf = $_GET['cpf'];

    require("./classecliente.php");


    $cliente = new Cliente();
    $mensagem="";
   if ($idCliente == 0) {
      // INSERÇÃO - Novo cliente
      if ($cliente->inserirClientes($nome,$telefone, $endereco, $cpf)) {
        echo "<div class='alert alert-success'>";
        echo "<h3>✅ Sucesso!</h3>";
        echo "<p>Cliente cadastrado com sucesso!</p>";
        echo "</div>";
      } else {
        echo "<div class='alert alert-danger'>";
        echo "<h3>❌ Erro!</h3>";
        echo "<p>Falha ao cadastrar o cliente. Tente novamente.</p>";
        echo "</div>";
      }
    } else {
      // ALTERAÇÃO - Cliente existente
      if ($cliente->alterarCliente($idCliente, $nomem,$telefone, $endereco, $cpf)) {
        echo "<div class='alert alert-success'>";
        echo "<h3>✅ Sucesso!</h3>";
        echo "<p>Dados do cliente alterados com sucesso!</p>";
        echo "</div>";
      } else {
        echo "<div class='alert alert-danger'>";
        echo "<h3>❌ Erro!</h3>";
        echo "<p>Falha ao alterar os dados do cliente. Tente novamente.</p>";
        echo "</div>";
      }
    }
    ?>
  </div>
</body>

</html>
