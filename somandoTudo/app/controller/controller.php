
<?php

require_once __DIR__ . '/../model/tarefa.php';

class tarefaController {

    private $tarefaModel;

    public function __construct() {
        $this->tarefaModel = new Tarefa();
    }

    public function index() {

        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        $id_usuario = $_SESSION['id'];
        $tarefas = $this->tarefaModel->listar($id_usuario);

        include __DIR__ . '/../view/listar.php';
    }

    public function criar() {

        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $id_usuario = $_SESSION['id'];
            $this->tarefaModel->criar($_POST['descricao'], $id_usuario);
        }

        header("Location: index.php?action=tarefas");
        exit;
    }

    public function excluir() {

        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $id_usuario = $_SESSION['id'];

            $this->tarefaModel->excluir($id, $id_usuario);
        }

        header("Location: index.php?action=tarefas");
        exit;
    }

    public function editar() {

        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_POST['id']) && isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {

            $id = $_POST['id'];
            $descricao = $_POST['descricao'];
            $id_usuario = $_SESSION['id'];

            $this->tarefaModel->editar($descricao, $id, $id_usuario);
        }

        header("Location: index.php?action=tarefas");
        exit;
    }
}
?>
