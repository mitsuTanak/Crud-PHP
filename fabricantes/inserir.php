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

    <link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Fabricantes - Insert </title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | <span>Insert</span> </h1>
        <hr>

        <form action="" method="POST">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="inserir" class="btn btn-secondary">Inserir fabricante</button>

        </form>

        <p class="paragrafo"><a href="listar.php"><button type="submit" class="btn btn-success ">Voltar para lista de fabricantes</button></a></p>
        <p><a href="../index.html"><button type="submit" class="btn btn-warning">Home</button></a></p>
    </div>
    
    
</body>
</html>