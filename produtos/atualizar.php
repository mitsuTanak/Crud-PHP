<?php
    require_once "../src/funcoes-fabricantes.php";
    $listaDeFabricantes = lerFabricantes($conexao);

    require_once "../src/funcoes-produtos.php";
    
    // Pegando o valor do id e sanitizando
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Criação de variavel $produtp para guardar o valor recebido d afunção
    $produto = lerUmProduto($conexao, $id);


    if (isset($_POST['atualizar'])) {
        
        // versão com filtro de sanitização (Melhor)
        // Capturando e limpando o que foi digitado no campo nome (Formulário)
        $nome = filter_input(INPUT_POST. 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST. 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qualidade = filter_input(INPUT_POST. 'qualidade', FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST. 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $fabricanteId = filter_input(INPUT_POST. 'fabricante', FILTER_SANITIZE_NUMBER_INT);

        // Chamando a função e passando os dados de conexão e o nome digitado
        atualizarProdutos($conexao, $id, $nome, $descricao, $preco, $quantidade, $fabrincanteId);

        // Redirecionamento (Nada a ver com a Tag do HTML)
        header("location:listar.php");

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Produtos - Atualizar</title>
</head>
    <body>
    
    <div class="container">
            <h1>Produtos | Select e Update</h1>
            <hr>

            <form action="" method="POST">
                <p>
                    <label for="nome">Nome:</label>
                    <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
                </p>

                <p>
                    <label for="preco">Preço:</label>
                    <input value="<?=$produto['preco']?>" type="number" name="preco" id="preco" min="0" max="100000" step="0.01" required>
                </p>

                <p>
                    <label for="quantidade">Quantidade:</label>
                    <input value="<?=$produto['quantidade']?>" type="number" name="quantidade" id="quantidade"  min="0" max="100" required>
                </p>

                <p>
                    <label for="fabricante">fabricante:</label>
                    <select name="fabricante" id="fabricante">

                        <option value=""></option>

                        <?php
                            foreach($listaDeFabricantes as $fabricante) {
                        ?>

                            <option 
                                <?php if ($produto['fabricante_id'] === $fabricante['id']) echo " Selected ";?>
                                value="<?=$fabricante['id']?>"> <!-- Para o banco -->
                                <?=$fabricante['nome']?> <!-- Exibição no Front -->
                        
                            </option>
                        <?php } ?>
                    </select>
                </p>
                <p>
                    <label for="descricao">Descrição:</label><br>
                    <textarea required name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
                </p>
                <button type="submit" name="atualizar" class="btn btn-secondary">Atualizar Produto</button>
            </form>
            <p class="paragrafo"><a href="listar.php"><button type="submit" class="btn btn-success ">Voltar para lista de fabricantes</button></a></p>
            <p><a href="../index.html"><button type="submit" class="btn btn-warning">Home</button></a></p>
        </div>

    </body>
</html>