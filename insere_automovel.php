<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Inserir Registro</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $placa = $_POST['placa'];
        $chassi = $_POST['chassi'];
        $montadora = $_POST['montadora'];
        
        $conexao = new mysqli('localhost', 'root', 'root', 'Atividade');
        
        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }
        
        $query = "INSERT INTO automoveis (nome, placa, chassi, codigo_montadora) VALUES ('$nome', '$placa', '$chassi', $montadora)";
        if ($conexao->query($query) === TRUE) {
            echo "<div class='alert alert-success'><h3>Automóvel cadastrado com sucesso!</h3></div>";
        } else {
            echo "<div class='alert alert-danger'><h3>Erro</h3> <p>Erro ao cadastrar o automóvel: " . $conexao->error."</p></div>";
        }
        
        mysqli_close($conexao);
    }
?>  
    <a href="listaautomoveis.php" class="btn btn-primary" role="button">Listar Automoveis</a>
</body>
</html>