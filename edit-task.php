<?php 
    session_start();
    include('conexao.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tarefas - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="cold-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar tarefa
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id'])){
                                $tarefa_id = mysqli_real_escape_string($conexao, $_GET['id']);
                                $sql = "SELECT * FROM rotina WHERE id = '$tarefa_id'";
                                $query = mysqli_query($conexao, $sql);

                                if(mysqli_num_rows($query) > 0){
                                    $tarefa = mysqli_fetch_array($query);
                                
                        ?>
                        <form action="acoes.php" method="POST">
                        <input type="hidden" name="tarefa_id" value="<?=$tarefa['id']?>">
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" value="<?=$tarefa['descricao']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Horário</label>
                                <input type="time" name="horario" value="<?=$tarefa['horario']?>" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="edit-task">Salvar</button>
                        </form>
                        <?php 
                                }
                            }else{
                                echo "<h5>Tarefa não encontrada</h5>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>