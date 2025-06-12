<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Lista de Clientes</title>
</head>

<body>
  <div class="container">
    <header>
      Cadastro de Clientes
    </header>
  </div>
  <div class="actions">
    <a href="./cliente.php?id_cliente=0"><button type="button">Novo Cliente</button></a>
  </div>
  <table>
    <thead>
      <th>ID</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Endereço</th>
      <th>CPF</th>
      <th>Alterar - Excluir</th>
    </thead>
    <tbody>
      <?php
      require("./classecliente.php");
      $cliente = new Cliente();
      $listaDeCliente = $cliente->listarClientes();

      foreach ($listaDeCliente as $registro) {
        $idCliente = $registro["id_cliente"];
        $nome = $registro["nome"];
        $telefone = $registro["telefone"];
        $endereco = $registro["endereco"];
        $cpf = $registro["cpf"];
        echo "<tr>";
        echo "<td>$idCliente</td>";
        echo "<td>$nome</td>";
        echo "<td>$telefone</td>";
        echo "<td>$endereco</td>";
        echo "<td>$cpf</td>";
        echo "<td class='group-buttons'>";
        echo "<a class='alterar' href='cliente.php?id_cliente=$idCliente'>Alterar</a>";
        echo "<a class='excluir' href='excluir.php?id_cliente=$idCliente'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>

</html>
