<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Lista de Automóveis</title>
</head>
<body>
    <h2>Lista de Automóveis</h2>
    <div>
        <form action="" method="GET">
            <label>Buscar por nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do carro">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <br>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Placa</th>
                    <th>Chassi</th>
                    <th>Montadora</th>
                </tr>
            </thead>
        <?php
        $conexao = new mysqli('localhost', 'root', 'root', 'Atividade');
        
        // Verifica se houve algum erro na conexão
        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }
        
        // Busca os automóveis
        $query = "SELECT a.nome, a.placa, a.chassi, m.nome AS montadora_nome FROM automoveis a
        INNER JOIN montadoras m ON a.codigo_montadora = m.codigo";
        
        // Verifica se foi realizada uma busca por nome
        if (isset($_GET['nome']) && !empty($_GET['nome'])) {
            $nome = $_GET['nome'];
            $query .= " WHERE a.nome LIKE '%$nome%'";
        }
        
        $result = $conexao->query($query);
        
        // Loop para exibir os automóveis
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['placa'] . "</td>";
                echo "<td>" . $row['chassi'] . "</td>";
                echo "<td>" . $row['montadora_nome'] . "</td>";
                echo "</tr>";
            }               
        } 
        else {
            echo "<tr><td colspan='4'>Nenhum automóvel encontrado.</td></tr>";
        }
        
        $conexao->close();
        ?>
    </table>
    </div>
    <a href="index.php" class="btn btn-primary" role="button">Adicionar</a>
</body>
</html>
