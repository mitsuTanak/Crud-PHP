<?php
//Verficando se o botão do fromulario foi acionado
if(isset($_POST['inserir']) ) {
    //Inportante as funções e a conexão
    require_once "../src/funcoes-fabricantes.php";

    //Capturando o que foi digitado no cmapo nome
    // $nome = $_POST['nome'];

    //Versão com filtro de sanitização(melhor)
    //Capturando e limpando o que foi digitados no campo nome(Formulário)
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    //Chamando a função e passando os dados de conexão e o nome digitado
    inserirFabricantes($conexao , $nome);

    //Redirecionamento (Nada a ver com a Tag do HTML)
    header("location:listar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content= "IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Insert </title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | Insert </h1>
        <hr>

        <form action="" method="POST">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="inserir">Inserir fabricante</button>

        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de fabricantes</a></p>
    <p><a href="../index.html">Home</a></p>
    
</body>
</html>