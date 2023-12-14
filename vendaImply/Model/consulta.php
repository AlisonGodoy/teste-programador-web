<?php 
include_once RAIZ . '/Model/ConexaoMSSQL.php';

class ListaGrid extends ConexaoMSSQL {

    //Realiza a consulta da página inicial de vendas
    public function lista($search = null){
        $sql = 'select p.referencia, p.descricao, v.preco_venda, f.nome, v.data_venda, CONCAT(v.UF, "-", v.cidade, "- ", v.bairro, " - ", v.rua, " - ", v.numero) AS endereco FROM venda AS v INNER JOIN fornecedor AS f ON f.id = v.cod_fornecedor INNER JOIN produto AS p ON p.referencia = v.cod_produto;';
        
        //caso seja populado o campo de busca, insere a cláusula Where na consulta com os dados informados (somente Id Produto e Nome)
        if ($search){
            $sql = "select p.referencia, p.descricao, v.preco_venda, f.nome, v.data_venda, CONCAT(v.UF, '-', v.cidade, '- ', v.bairro, ' - ', v.rua, ' - ', v.numero) AS endereco FROM venda AS v INNER JOIN fornecedor AS f ON f.id = v.cod_fornecedor INNER JOIN produto AS p ON p.referencia = v.cod_produto where (p.descricao like '%$search%' OR p.referencia like '%$search%') ;";
        }
        return $this->consulta($sql);    
    }
}