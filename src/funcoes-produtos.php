<?php

    // Programar a função lerProdutos neste ponto 
    require_once "conecta.php";
    
    // Programar a função lerFabricantes neste ponto
    function lerProdutos(PDO $conexao):array{
        // String com comando SQL para trazer apenas o nº do id (ANTIGO)
        // $sql = "SELECT id, nome, descricao, preco, quantidade, fabricantes_id FROM produtos ORDER BY nome";
        $sql = "SELECT produtos.id,
        produtos.nome AS produto,
        produtos.descricao,
        produtos.preco,
        produtos.quantidade,
        fabricantes.nome AS fabricante
        FROM produtos INNER JOIN fabricantes 
        ON produtos.fabricante_id = fabricantes.id
        ORDER BY produto";
        try {
            // Preapração do comando
            $consulta = $conexao->prepare($sql);

            // Execução do Comando
            $consulta->execute();

            // Capturar os resutados
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
        return $resultado;
    }
    
    // Programar a função inserirProdutos neste ponto 
    function inserirProdutos(PDO $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricanteId):void{ // Void indica sem retorno
        $sql = "INSERT INTO produtos(nome, descricao, preco, quantidade, fabricante_id ) VALUES(:nome, :descricao, :preco, :quantidade, :fabricante_id )";

        try {
            // Preparação do comando
            $consulta = $conexao->prepare($sql);

            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricante_id', $fabricanteId, PDO::PARAM_INT);

            // Execução do comando
            $consulta->execute();
        } catch (Exception $erro) {
            die ("Erro:".$erro->getMessage());
        }
    }
    
    // Programar a função lerUmProduto neste ponto 
    function lerUmProduto(PDO $conexao, int $id):array {
        $sql = "SELECT id, nome, descricao, preco, quantidade, fabricante_id  FROM produtos WHERE id = :id";
        try {
            // Preparação do comando
            $consulta = $conexao->prepare($sql);

            $consulta->bindParam(':id', $id, PDO::PARAM_INT);

            // Execução do comando
            $consulta->execute();
            
            //Captura os resultados
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
        return $resultado;
    }
    
    // Programar a função atualizarProduto neste ponto
    function atualizarProdutos(PDO $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricanteId) {
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, fabricantes_id = :fabricante_id WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);

            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricante_id', $fabricanteid, PDO::PARAM_INT);

            $consulta->execute();
        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
    } 
    
    // Programar a função excluirProduto neste ponto 
    function excluirProduto(PDO $conexao, int $id):void {
        $sql = "DELETE FROM produtos WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
    }
    
    /* Funções utilitárias dump e formataMoeda */
    function dump($dados){
        echo "<pre>";
        var_dump($dados);
        echo "<pre>";

    } 

    function formataMoeda(float $valor) : string {
        return "R$ " .number_format($valor, 2, ",", ".");
        
    }