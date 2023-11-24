<?php
//Chamada da função
require_once '../src/funcoes-fabricantes.php';

//Obtido o valor do parâmetro da URL com filtro para remover algo que posssa ser injetado por algum usário
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Sem segurança (Não recomendado)
//$id = $_GET['id'];

//Teste para ver se está capturando
//echo $id

//Criação da variavel $fabricantes para guardar o vlaor recebido da função
$fabricantes = lerUmFabricante($conexao, $id);

?>

<!-- Teste para ver a variavel $fabricantes criada acima recebeu o valor corretamente -->
<!-- <pre><?=var_dump($fabricantes)?> -->

<!-- ______________________ -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content= "IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Fabricantes - Atualizar </title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE </h1>
        <hr>
        <?php
        
        //Executa se o botão atualizar for pressionado
        if(isset($_POST['atualizar'])) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

            atualizarFabricante($conexao, $id, $nome);

            //Atualiza direto
            //header("location:listar.php");

            //Mensagem + refresh
            //Mostra a mensagem espera 3s e volta para a página fabricantes
            //echo "<p>Fabricante atualizado com sucesso!</p>";
            // header("refresh:3; url=listar.php");

            //Para mostrar a mensagem após atualizar
            header("location:listar.php?status=sucesso");
        }
        ?>
        
        <form action="" method="POST">
            <!-- Traz o id oculto para controle do programador(para ler Ir em Inspecionar) -->
            <input type="hidden" name="<?=$fabricante['id']?>">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$fabricante['id']?>" type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar" class="btn btn-secondary">Atualizar fabricante</button>

        </form>
        
        <p class="paragrafo"><a href="listar.php"><button type="submit" class="btn btn-success ">Voltar para lista de fabricantes</button></a></p>
        <p><a href="../index.html"><button type="submit" class="btn btn-warning">Home</button></a></p>
    </div>


    
  </body>
</html>