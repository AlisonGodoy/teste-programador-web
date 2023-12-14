<?php 
    include_once './config.ini.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./Resources/geral.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Venda Imply (teste)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active" id="Vendas">
                    <a class="nav-link" onclick="navigate('vendas')" href="#">Home - Vendas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active" id="cadvenda">
                    <a class="nav-link" onclick="navigate('cadvenda')" href="#">Cadastrar Vendas</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" id="content">
        
    </div>
    <?php if (@$_REQUEST['page']) { 
        echo "<script>navigate('".$_REQUEST['page']."', '".@$_REQUEST['busca']."')</script>";   
    } else {
        echo "<script>navigate('vendas')</script>";
    } ?>
</body>
</html>
