<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Cadastro de Automóveis</title>
</head>
<body>
    <div class="container">
    <div class="col col-lg-6">
    <h1>Cadastro de Automóveis</h1>
    <form method="POST" action="insere_automovel.php">
        <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome">
  </div>
  <div class="mb-3">
    <label for="placa" class="form-label">Placa</label>
    <input type="text" class="form-control" id="placa" name="placa">
  </div>
  <div class="mb-3">
    <label for="chassi" class="form-label">Chassi</label>
    <input type="text" class="form-control" id="chassi" name="chassi">
  </div>
  <div class="mb-3">
    <label for="montadora" class="form-label">Montadora</label>
    <select class="form-select" name="montadora" required>
    <?php

$conexao = mysqli_connect("localhost", "root", "root", "Atividade");

$consulta = mysqli_query($conexao, "SELECT * FROM montadoras");

while ($montadora = mysqli_fetch_assoc($consulta)) {
    echo "<option value='" . $montadora['codigo'] . "'>" . $montadora['nome'] . "</option>";
}


mysqli_close($conexao);
?>
</select>

  </div>

    <br>

        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
    </div>
</div>
</body>
</html>