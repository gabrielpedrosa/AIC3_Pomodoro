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
        <div class="list-container">
            <div class="list-container-title">
                <h2>Lista de Disciplinas</h2>
            </div>
            <div class="list-container-list">
                <div class="list-container-list-items">
                    <ul>
                        <?php 
                        for($i = 0; $i < 10; $i++){
                            echo '<li><input type="checkbox" name="disciplina-'.$i.'" id="disciplina-'.$i.'"><a href="">'.$i.'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="list-container-list-painel">
                    <div class="list-container-list-painel-box">
                        <div class="list-container-list-painel-box-button_group">
                            <button>Salvar Progresso</button>
                            <button>Adicionar Disciplina</button>
                            <button class="red-button">Remover Disciplina</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>