<?php 

require_once __DIR__ . '/../config/database.php';

class Tarefa{
    private $conn; 

    public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }

    # Listar

    public function listar($id_usuario){
    $id_usuario = intval($id_usuario);
    $tarefas = [];

    $sql = "SELECT * FROM tarefas 
            WHERE id_usuario = $id_usuario 
            ORDER BY data_criacao DESC";

    $resultado = $this->conn->query($sql);

    if($resultado->num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            $tarefas[] = $row;
        }
    }

    return $tarefas;
    }

    # Criar

    public function criar($descricao, $id_usuario){
    $descricao = $this->conn->real_escape_string($descricao);
    $id_usuario = intval($id_usuario);

    $sql = "INSERT INTO tarefas (descricao, id_usuario)
            VALUES ('$descricao', $id_usuario)";

    return $this->conn->query($sql);
    }

    #Excluir 

    public function excluir($id, $id_usuario){
    $id = intval($id);
    $id_usuario = intval($id_usuario);

    $sql = "DELETE FROM tarefas 
            WHERE id = $id AND id_usuario = $id_usuario";

    return $this->conn->query($sql);
        }

    #editar

        public function editar($descricao, $id, $id_usuario){
        $descricao = $this->conn->real_escape_string($descricao);
        $id = intval($id);
        $id_usuario = intval($id_usuario);

        $sql = "UPDATE tarefas 
                SET descricao = '$descricao' 
                WHERE id = $id AND id_usuario = $id_usuario";

        return $this->conn->query($sql);
    }
}

?>