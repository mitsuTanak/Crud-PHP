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
    <title>Produtos</title>
</head>
<body>

    <div class="container">
        <h1>Produtos | SELECT <a href="../index.html"></a></h1>

        <hr>

        <h2>Lendo e carregando todos os produtos</h2>

        <p><a href="inserir.php" style="color:blue;">Inserir um novo Produto</a></p>

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
                        <a href="atualizar.php?id=<?=$produto['id']?>" style="color:blue;">Atualizar</a>
                        <a class="excluir" href="excluir.php?id=<?=$produto['fabricante']?>" style="color:red;">excluir</a>
                    </p>

                    <hr>
                </article>
            <?php } ?>
        </div>
    </div>

    <!-- Chamado arquivo JS paraperguntar antes de excluir -->
    <script src="../js/confirm.js"></script>
    
</body>
</html>