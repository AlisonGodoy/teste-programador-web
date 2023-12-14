<?php

//Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //Resgata os valores que foram enviados
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $fornecedor = $_POST['fornecedor'];
    $data = $_POST['data'];
    $cep = $_POST['cep'];
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    //!Ponto de melhoria! - include do Model não estava carregando a conexão - realizado novamente abaixo
    $con = 'mysql:host=localhost;dbname=vendaimply';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO($con, $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Monta consulta para realizar o insert
        $sql = 'INSERT INTO venda(cod_produto,quantidade,preco_venda,cod_fornecedor,data_venda,CEP,UF,cidade,bairro,rua,numero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conexao->prepare($sql);
        
        //Executa o insert
        $stmt->execute([$produto[0], $quantidade, $preco, $fornecedor[0], $data, $cep, $uf, $cidade, $bairro, $rua, $numero]);
        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso']);

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar: ' . $e->getMessage()]);

    } finally {
        $conexao = null;

    }

} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição não permitido']);

}

?>