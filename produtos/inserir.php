<?php
    require_once "../src/funcoes-fabricantes.php";
    $listaDeFabricantes = lerFabricantes($conexao);

    if (isset($_POST['inserir'])) {
        require_once "../src/funcoes-produtos.php";

        // versão com filtro de sanitização (Melhor)
        // Capturando e limpando o que foi digitado no campo nome (Formulário)
        $nome = filter_input(INPUT_POST. 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST. '', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qualidade = filter_input(INPUT_POST. 'qualidade', FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST. 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $fabricanteID = filter_input(INPUT_POST. 'fabricante', FILTER_SANITIZE_NUMBER_INT);

        // Chamando a função e passando os dados de conexão e o nome digitado
        inserirProdutos($conexao, $nome, $descricao, $preco, $quantidade, $fabrincantesId);

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Produtos - <span>Inserir</span></title>
</head>
    <body>

        <div class="container">
            <h1>Produtos | <span>Insert</span></h1>
            <hr>

            <form action="" method="POST">
                <p>
                    <label for="nome">nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </p>

                <p>
                    <label for="preco">preço:</label>
                    <input type="number" name="preco" id="preco" min="0" max="100000" step="0.01" required>
                </p>

                <p>
                    <label for="quantidade">quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade"  min="0" max="100" required>
                </p>

                <p>
                    <label for="fabricante">fabricante:</label>
                    <select name="fabricante" id="fabricante">

                        <option value=""></option>

                        <?php
                            foreach($listaDeFabricantes as $fabricante) {
                        ?>

                            <option value="<?=$fabricante['id']?>"> <!-- Para o banco -->
                            <?=$fabricante['id']?> <!-- Exibição no Front -->
                        
                            </option>
                        <?php } ?>
                    </select>
                </p>
                <p>
                    <label for="descricao">Descrição:</label><br>
                    <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
                </p>
                <button type="submit" name="inserir" class="btn btn-secondary">inserir Produto</button>
            </form>
            <p class="paragrafo"><a href="listar.php"><button type="submit" class="btn btn-success ">Voltar para lista de fabricantes</button></a></p>
            <p><a href="../index.html"><button type="submit" class="btn btn-warning">Home</button></a></p>
        </div>

    </body>
</html>