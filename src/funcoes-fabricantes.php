<?php
    // Incluir neste ponto o arquivo conecta.php 
    require_once "conecta.php";
    
    // Programar a função lerFabricantes neste ponto
    function lerFabricantes(PDO $conexao):array{
        // String com comando SQL
        $sql = "SELECT id, nome FROM fabricantes";
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
    
    // Inserir um fabricante (PDO - PHP Database Object),
    // Obs void indica que a função não tem retorno "return"

    // Programar a função inserirFabricante neste ponto

    function inserirFabricantes(PDO $conexao, string $nome):void{
        // Insere no banco de dados o valor digitado pelo usurio no formulario armazenado na variavel $nome
        // OBS Não é necessário criar para ID que é automatico

        // :qualquer_coisa -> isso é um named parameter
        $sql = "INSERT INTO fabricanter(nome) VALUES(:nome)";
        try {
            $consulta = $conexao->prepare($sql);

            // bindParam('nome do parametro', $variavel_com_valor, constante de verificação)
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die ("Erro:".$erro->getMessage());
        }
    }
    
    // Programar a função lerUmFabricante neste ponto
    function lerUmFabricante(PDO $conexao, int $id):array {
        $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            
            //Aqui usado fetch porque é apenas 1 fabricante
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
        return $resultado;
    }
    
    // Programar a função atualizarFabricante neste ponto
    function atualizarFabricante(PDO $conexao, int $id, string $nome):void {
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
    }
    
    // Programar a função excluirFabricante neste ponto

    function excluirFabricante(PDO $conexao, int $id):void {
        $sql = "DELETE FROM fabricantes WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

        } catch (Exception $erro) {
            die ("Erro".$erro->getMessage());
        }
    }
    