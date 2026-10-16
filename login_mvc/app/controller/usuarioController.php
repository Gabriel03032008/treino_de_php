<?php 

require_once __DIR__ . '/../model/usuario.php';

class UsuarioController{
    private $UsuarioModel; 

    public function __construct(){
        $this->UsuarioModel = new Usuario(); 
    }

    public function index(){
        if(isset($_SESSION['id'])){
            header("location: index.php?action=painel");
            exit;
        }

        include __DIR__ . "/../view/login.php";
    }

    public function autenticar(){
        if(isset($_POST['email'],$_POST['senha'])){
            header("Location: index.php");
            exit;
        }

        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if(empty($email) || empty($senha)){
            $erro = "preencha seu email e senha";
            include __DIR__ . "/../view/login.php";
        }
    }
}


?>
