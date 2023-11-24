<?php
  require_once "../src/funcoes-fabricantes.php";
  $listaDeFabricantes = lerFabricantes($conexao);
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
    <title>Fabricantes</title>
</head>
<body class="body">
    <div class="container">
        <h1>Fabricantes | <span>SELECT</span></h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>

        <p><button type="button" class="btn btn-primary"><a href="inserir.php" class="link">Inserir um novo fabricante</a></button></p>

        <!-- _______________ -->
        <!-- Trecho para exibir a mensagem s eclicar botão atualizar -->

        <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso') {?>
        <p>Fabricante atualizado com sucesso !</p>
        <?php } ?>

        <!-- _____________________ -->

        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //echo "<pre>";
                //var_dump($resultado); //Teste
                //echo "<pre>";
                
                foreach($listaDeFabricantes as $fabricante) { ?>

                <tr>
                     <td> <?=$fabricante['id']?></td>
                     <td> <?=$fabricante['nome']?></td>
                     <!-- Link dinâmico -->
                     <td><a href="atualizar.php?id=<?=$fabricante['id']?>" class="link"><button type="button" class="btn btn-danger excluir">Excluir</button></a></td>

                     <!-- Solução mais simples para carregar antes de excluir -->
                     <!-- Colocar depois do <a: onclick="return confirm('Deseja excluir o item ?')" -->

                </tr>

                <?php } ?>
            </tbody>
        </table>

        <p><a href="../index.html"><button type="submit" class="btn btn-warning">Home</button></a></p>
    </div>

    <!-- Chamando arquivo js para perguntar antes de excluir -->
    <script> src="../js/confirm.js"</script>
    
</body>
</html>