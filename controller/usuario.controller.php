<?php
    require_once 'model/usuario.model.php';
    require_once 'service/usuario.service.php';
    require_once 'conexao/conexao.php';

    
    @$acaoUs = isset($_GET['acaoUs'])?$_GET['acaoUs']:$acaoUs;
    @$idUs = isset($_GET['idUs'])?$_GET['idUs']:$idUs;

    if($acaoUs == 'inserir'){
        $usuario = new Usuario();
        $usuario->__set('nome',$_POST['nome']);
        $usuario->__set('email',$_POST['email']);
        $usuario->__set('senha',$_POST['senha']);
    

        $conexao = new Conexao();

        $usuarioService = New UsuarioService($usuario,$conexao);
        $usuarioService->inserir();
       // header('location: index.php');
    }
    if($acaoUs == 'recuperar'){
        
        $usuario = new Usuario();

        $conexao = new Conexao();

        $usuarioService = New UsuarioService($usuario,$conexao);
        $usuario = $usuarioService->recuperar();
      
    }
    if($acaoUs == 'recuperarUsuario'){
        
        $usuario = new Usuario();

        $conexao = new Conexao();

        $usuarioService = New UsuarioService($usuario,$conexao);
        $usuario = $usuarioService->recuperarUsuario($idUs);
      
    }
    if($acaoUs == 'alterar'){
        $usuario = new Usuario();
        $usuario->__set('nome',$_POST['nome']);
        $usuario->__set('email',$_POST['email']);
        $usuario->__set('senha',$_POST['senha']);
        $usuario->__set('id',$_POST['id']);  
        $conexao = new Conexao();

        $usuarioService = New UsuarioService($usuario,$conexao);
        $usuarioService->alterar();
       // header('location: index.php');
    }
    if($acaoUs == 'excluir'){
        $usuario = new Usuario();
       
        $usuario->__set('id',$_POST['id']);  
        $conexao = new Conexao();

        $usuarioService = New UsuarioService($usuario,$conexao);
        $usuarioService->excluir();
       // header('location: index.php');
    }
    if($acaoUs == 'loginUsuario'){
        $usuario = new Usuario();
        $conexao = new Conexao();
        
        $email = $_POST['email'];  
        $senha = $_POST['senha'];  
        
        $usuarioService = New UsuarioService($usuario,$conexao);
        $usuario = $usuarioService->loginUsuario($email,$senha);

        foreach ($usuario as $key => $usuario) {
            if(!isset($usuario->email)){
                echo '<script>alert("usuário com email desconhecido")</script>
                <met http-equiv="refresh" content="0;url=index.php">';
            }else{
                $_SESSION['usuarioLogado']= $usuario->nome;
                $_SESSION['emailLogado']= $usuario->email;
                $_SESSION['idLogado']= $usuario->id;
                //echo $_SESSION['usuarioLogado'];
            }
        }

       header('location: index.php?link=4');
    }
    if($acaoUs =='sair'){
        session_destroy();
        header('location: index.php');

    }

?>