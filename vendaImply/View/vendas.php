<?php 
  include_once '../config.ini.php';
  include_once RAIZ . '/Model/consulta.php'; 
  $arquivos = new ListaGrid();
  $lista = $arquivos->lista(@$_REQUEST['filtro']);
  $total = 0
?>
<div class="d-flex justify-content-center mt-2">
  <h4 class="display-7">Consulta de Vendas</h4>
</div>

<nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="<?=URL?>">
    <input class="form-control mr-sm-2" type="search" placeholder="Busca" aria-label="Search" name="busca">
    <input hidden name="page" value="vendas">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th>Cod. Produto</th>
      <th>Descricao</th>
      <th>Preco</th>
      <th>Fornecedor</th>
      <th>Data</th>
      <th>Endereco</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    // Inicializa o total = 0 e a cada loop da consulta soma o valor a variável
    $total = 0; 
    foreach ($lista as $arquivo) { 
  ?>
      <tr>
        <th><?= $arquivo->referencia ?></th>
        <th><?= $arquivo->descricao ?></th>
        <td><?= $arquivo->preco_venda ?></td>
        <td><?= $arquivo->nome ?></td>
        <td><?= $arquivo->data_venda ?></td>
        <td><?= $arquivo->endereco ?></td>
      </tr>
  <?php 
    $total += $arquivo->preco_venda; // soma o total
    } 
  ?>
  
  <tr>
    <td><b>Total Vendas: </b>R$<?= $total ?></td>  
    
  </tr>
  </tbody>
</table>
