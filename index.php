<?php 
session_start();
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php include('mensagem.php')?>
        <div class="row">
            <div class="col=md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de usuários
                            <a href="create-task.php" class="btn btn-primary float-end">Adicionar usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Tarefa</th>
                                <th>Horário</th>
                                <th>Açoes</th>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM rotina";
                                $tarefas = mysqli_query($conexao, $sql);
                                if(mysqli_num_rows($tarefas) > 0){
                                    foreach($tarefas as $tarefa){
                            ?>
                            <tr>
                                <td><?=$tarefa['descricao']?></td>
                                <td><?=$tarefa['horario']?></td>
                                <td>
                                    <a href="edit-task.php?id=<?=$tarefa['id']?>" class="btn btn-warning btn-sm"><span class="bi-pencil-fill">&nbsp;</a>
                                    <form action="acoes.php" method="POST" class="d-inline">
                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" class="btn btn-danger btn-sm" name="delete-task" value="<?=$tarefa['id']?>"><span class="bi-trash3-fill">&nbsp;</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                    }
                                    } else{
                                        echo "<h5> Nenhuma tarefa encontrada!";
                                    }
                            
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>