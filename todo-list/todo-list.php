<?php 
# Conexão com o banco 
$localhost = "localhost"; 
$banco = "todo_list"; 
$usuario = "root"; 
$senha = ""; 

$conn = new mysqli($localhost, $usuario, $senha, $banco); 

if($conn->connect_error){ 
    die("Algo deu errado: " . $conn->connect_error); 
} 

# Criação de tarefas 
if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){ 
    $descricao = $conn->real_escape_string($_POST['descricao']); 
    $sqlCreate = "INSERT INTO tarefas (descricao) VALUES ('$descricao')"; 
    
    if($conn->query($sqlCreate) === TRUE){ 
        header("Location: todo-list.php"); 
        exit();
    } 
} 

# Exclusão de tarefas 
if(isset($_GET['delete'])){ 
    $id = intval($_GET['delete']); 
    $sqlDelete = "DELETE FROM tarefas WHERE id = $id"; 
    
    if($conn->query($sqlDelete) === TRUE){ 
        header("Location: todo-list.php"); 
        exit();
    } 
} 

$tarefas = []; 

# Listar tarefas 
$sqlSelect = "SELECT * FROM tarefas ORDER BY data_criacao DESC"; 
$resultados = $conn->query($sqlSelect); 

if($resultados && $resultados->num_rows > 0){ 
    while($row = $resultados->fetch_assoc()){ 
        $tarefas[] = $row; 
    } 
} 
?> 
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Todo-list</title> 
</head> 
<body> 
    <h1>TO-DO List</h1> 

    <form action="todo-list.php" method="POST"> 
        <input type="text" placeholder="Descrição da sua tarefa" name="descricao" required /> 
        <button type="submit">Adicionar</button> 
    </form> 

    <?php if(!empty($tarefas)): ?> 
        <h2>Suas tarefas</h2> 
        <ul> 
            <?php foreach($tarefas as $tarefa): ?> 
                <li> 
                    <?php echo htmlspecialchars($tarefa['descricao']); ?> 
                    <a href="todo-list.php?delete=<?php echo $tarefa['id']; ?>">Excluir</a> 
                </li> 
            <?php endforeach; ?> 
        </ul> 
    <?php else: ?> 
        <h3>Não há tarefas registradas.</h3> 
    <?php endif; ?> 
</body> 
</html>