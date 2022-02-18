<?php
    include('../../database/connection.php');

    $disciplina = $_GET['disciplina'];
    

    try{
        $sql  = "select * from select_tarefas where id_disciplina_fk = :disciplina;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":disciplina", $disciplina);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($rows){
            $tarefas = $rows;
        }else{
            echo "
            <script type='text/javascript'>
                alert('Usuário ou senha inválidos');
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/index.php'>";
        }
    }
    catch (PDOException $error) {
        echo "Error:" . $error->getMessage();
    }
// var_dump($tarefas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/listarTarefas.css">
    <title>Lista de Tarefas</title>
</head>
<body>
    <div class="container">
        <form action="../../controller/AtualizarTarefa.php" method="post">
            <div class="list-container">
                <div class="list-container-title">
                    <h2>Lista de Tarefas</h2>
                </div>
                <div class="list-container-list">
                    <div class="list-container-list-items">
                        <ul>

                            <?php
                            foreach($tarefas as $tarefa): ?>
                                <li><input type="checkbox" name="tarefas[]" value="<?php echo $tarefa->id; ?>" id="tarefa[<?php echo $tarefa->id; ?>]" <?php if($tarefa->stats == 1): ?> checked <?php endif; ?> ><a href="fazerTarefa.php?tarefa=<?php echo $tarefa->id; ?>"><?php echo $tarefa->nome; ?></a></li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="list-container-list-painel">
                        <div class="list-container-list-painel-box">
                            <div class="list-container-list-painel-box-button_group">
                                <button type="submit">Salvar Progresso</button>
                                <button onclick="location.href = 'adicionarTarefa.php'">Adicionar Tarefa</button>
                                <button class="red-button" onclick="location.href = '../disciplinas/listarDisciplinas.php'">Voltar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>