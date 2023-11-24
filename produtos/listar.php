<?php

    require_once "../src/funcoes-produtos.php";
    $listaDeProdutos = lerProdutos($conexao);

    // Chamada de função para teste que retorna array
    // dump($listaDeProdutos)
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Produtos</title>
</head>
<body>

    <div class="container">
        <h1>Produtos | SELECT <a href="../index.html"></a></h1>

        <hr>

        <h2>Lendo e carregando todos os produtos</h2>

        <p><a href="inserir.php" style="color:blue;"><button type="button" class="btn btn-primary">Inserir um novo Produto</button></a></p>

        <hr>

        <div class="produtos">
            <!-- laço para exibir os produtos cadastrados disponiveis -->
            <?php foreach($listaDeProdutos as $produto){ ?>

                <article>
                    <!-- Quando somente o id do fabricante (Antigo) -->
                    <!-- <h3> <?=$produto['nome']?> </h3>-->

                    <!-- Quando traz o nome do fabricante (ATUAL) -->
                    <h3><?=$produto['produto']?></h3>

                    <!-- Formatação direto no codifo(Antigo) -->
                    <!-- <p><b>Preço:</b> <?=number_format($produto['preco'], 2, ",", ".")?></p> -->

                    <!-- Formatação via função criada: "formataMoeda" -->
                    <p><b>Preço:</b> <?=formataMoeda($produto['preco'])?></p>

                    <p><b>Quantidade:</b> <?=$produto['quantidade']?></p>
                    <p><b>Descrição:</b> <?=$produto['descricao']?></p>


                    <!-- Traz somente o id do fabricante (Antigo) -->
                    <!-- <h3> <?=$produto['fabricante_id']?> </h3>-->


                    <p><b>Fabricante:</b> <?=$produto['fabricante']?></p>


                    <!-- Link dinâmico -->
                    <p>
                        <a href="atualizar.php?id=<?=$produto['id']?>" style="color:blue;"><button type="button" class="btn btn-success">Atualizar</button></a>
                        <a class="excluir" href="excluir.php?id=<?=$produto['fabricante']?>" style="color:red;"><button type="button" class="btn btn-danger">excluir</button></a>
                    </p>

                    <hr>
                </article>
            <?php } ?>
        </div>
        <p><a href="../index.html"><button type="submit" class="btn btn-warning">Home</button></a></p>
    </div>

    <!-- Chamado arquivo JS paraperguntar antes de excluir -->
    <script src="../js/confirm.js"></script>
    
</body>
</html>