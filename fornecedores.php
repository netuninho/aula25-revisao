<?php
include "conexao.php";
include "menu.php";

try{
    $sql = "SELECT * FROM tblfornecedores";
    $qry = $con->query($sql);
    $fornecedores = $qry->fetchALL(PDO::FETCH_OBJ);

    //echo "<pre>";
    //    print_r($fornecedores);
       
} catch(PDOException $e){
    echo $e->getMessage();
}


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sistema</title>
  </head>
  <body>
    <h1>Fornecedores Cadastrados</h1>
<hr>

<div class="container">
    <a href="cadfornecedor.php" class="btn btn-outline-success">Novo</a>
    <hr>
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th>ID Fornecedor</th>
                <th>Fornecedor</th>
                <th>Contato</th>
                <th>Produto
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($fornecedores as $fornecedor) { ?>
            <tr>
                <th><?php echo $fornecedor->idfornecedor ?></th>
                <th><?php echo $fornecedor->fornecedor ?></th>
                <th><?php echo $fornecedor->contato ?></th>
                <th><?php echo $fornecedor->produto ?></th>
                
                <th>
                    <a href="frmfornecedor.php?          idfornecedor=<?php 
                    echo $fornecedor -> idfornecedor ?>">
                        <img src="./img/editar.png" alt="">
                    </a>
                </th>
                
                <th>
                    <a href="frmfornecedor.php?op=del$idfornecedor=<?php 
                    echo $fornecedor -> idfornecedor?>">
                        <img src="./img/excluir.png" alt="">
                    </a>
                </th> 
            </tr>
            <?php } ?>
            </tbody>
           

    </table>
</div>

    <?php 
    
    include "rodape.php";
    ?>