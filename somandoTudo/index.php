<?php

    require_once __DIR__ .'/app/controller/controller.php';
    require_once __DIR__ .'/app/controller/usuariocontroller.php';

    $controller = new tarefaController();
    $usuarioController = new UsuarioController();

    $action = $_GET['action'] ?? 'index';

    switch ($action) {

        case 'criar':
            $controller->criar();
            break;
        case 'autenticar':
            $usuarioController->autenticar();
            break;
        case 'painel':
            $usuarioController->painel();
            break;
        case 'excluir':
            $controller->excluir();
            break;
        case 'editar':
            $controller->editar();
            break;
        default:
            $usuarioController->index();
            break;
    }
?>