<?php 

# Conexão com o banco

    $localhost = "localhost";
    $banco = "todo_list";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($localhost, $usuario ,  $senha, $banco );

    if($conn -> connect_error){
            die("algo deu errado" . mysqli_connect_error());
    }

# criacao de tarefas


        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
            $descricao = $conn -> real_escape_string($_POST['descricao']);
            $sqlCreate = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";

            if($conn -> query($sqlCreate) == TRUE){
                header("localhost: todo-list.php");
            }
        }
        

# Exclusão de tarefas


$tarefas=[]; 
# Listar tarefas

            $sqlSelect = "SELECT * FROM tarefas ORDER BY data_criacao DESC";

            $resultados = $conn -> query($sqlSelect);

            if($resultados -> num_rows > 0){
                while($row = $resultados -> fetch_assoc()){
                    $tarefas[] = $row;
                }
            }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-list</title>
</head>
<body>

    <h1>TO-DO List</h1>
    <form action="todo-list.php" method="POST">
        <input type="text" placeholder="Descrição da sua tarefa" name="descricao"/>
        <button type="submit">Adicionar</button> 
    </form>

    <?php if(!empty($tarefas)):?>

    <h2>Suas tarefas</h2>

    <ul>
        <?php 
            foreach($tarefas as $tarefas);
        ?>
        <li>
        <?php 
            echo $tarefas['descricao'];
        ?>
        </li>
        <li>tenho uma tarefa</li>
    </ul>

    <?php else: ?>

    <h3>não tem tarefas</h3>

    <?php endif; ?> 
</body>
</html>