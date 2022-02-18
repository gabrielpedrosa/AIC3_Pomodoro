<?php
    include('../../database/connection.php');

    try{
        $sql  = "select * from select_disciplinas;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($rows){
            $disciplinas = $rows;
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/listarTarefas.css">
    <title>Lista de Disciplinas</title>
</head>
<body>
    <div class="container">
        <form action="../../controller/AtualizarDisciplina.php" method="post">
            <div class="list-container">
                <div class="list-container-title">
                    <h2>Lista de Disciplinas</h2>
                </div>
                <div class="list-container-list">
                    <div class="list-container-list-items">
                        <ul>

                            <?php
                                foreach($disciplinas as $disciplina): ?>
                                    <li><input type="checkbox" name="disciplinas[]" value="<?php echo $disciplina->id; ?>" id="disciplinas[<?php echo $disciplina->id; ?>]" <?php if($disciplina->stats == 1): ?> checked <?php endif; ?> ><a href="../tarefas/listarTarefas.php?disciplina=<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></a></li>
                                <?php
                                endforeach;
                                ?>
                        </ul>
                    </div>
                    <div class="list-container-list-painel">
                        <div class="list-container-list-painel-box">
                            <div class="list-container-list-painel-box-button_group">
                                <button>Salvar Progresso</button>
                                <button onclick="location.href = 'adicionarDisciplina.php'">Adicionar Disciplina</button>
                                <button class="red-button" onclick="location.href = '/index.php'">Sair</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>