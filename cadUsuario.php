
<?php

if(isset($_GET['metodo'])){
    $metodo = $_GET['metodo'];
    $idUs = $_GET['idUs'];
    $acaoUs = 'recuperarUsuario';
    require_once 'usuario.controller.php';

    foreach ($usuario as $key => $usuario) {
        $nome = $usuario->nome;
        $email =$usuario->email;
        $senha = $usuario->senha;
    }
}
?>


<form action="index.php?link=3&acaoUs=<?php if(!isset($metodo)){echo 'inserir';}elseif($metodo == 'alterar'){echo 'alterar';}elseif($metodo=='excluir'){echo 'excluir';}?>" method="post" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?php if(isset($nome)){echo $nome;}else{echo '';}?>">
    </div>
    <div class="col-md-6">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?php if(isset($email)){echo $email;}else{echo '';}?>">
    </div>
    <div class="col-md-6">
        <label>Senha</label>
        <input type="password"  class="form-control" name="senha" value="<?php if(isset($senha)){echo $senha;}else{echo '';}?>">
    </div>
    <div>
    <?php
    
       
    ?>
    </div>
    <input type="hidden" name="id" value="<?php if(isset($idUs)){echo $idUs;}else{echo '';}?>">
    <input type="submit" class="btn btn-primary col-md-3" value="<?php if(!isset($metodo)){
        echo 'inserir';}elseif($metodo == 'alterar'){
            echo 'alterar';}elseif($metodo=='excluir'){
                echo 'excluir';
            }
        ?>">
        
</form>