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
    <link rel="stylesheet" href="../../css/adicionarTarefa.css">
    <title>Adicionar Tarefa</title>
</head>
<body>
    <div class="container">
    <div class="form-container">
            <div class="form-container-box">
                <div class="form-container-box-title">
                    <h2>Nova Tarefa</h2>
                </div>
                <form action="../../controller/CadastrarTarefa.php" method="post">
                    <div class="form-container-box-form">
                        <div class="form-container-box-form-field_group">
                            <input id="homework" name="homework" type="text" required />
                            <label for="homework">Tarefa</label>
                        </div>
                        <div class="form-container-box-form-field_group">
                            <textarea id="description" name="description" type="text" required ></textarea>
                            <label for="description">Descrição</label>
                        </div>
                        <div class="form-container-box-form-field_group">
                            <select name="discipline" id="discipline" required>
                                <option value="" selected></option>
                                <?php
                                    foreach($disciplinas as $disciplina){
                                        echo '<option value="'.$disciplina->id.'">'.$disciplina->nome.'</option>';
                                    }
                                ?>
                            </select>
                            <label for="discipline">Matéria</label>
                        </div>
                        <div class="form-container-box-form-button_group">
                            <button type="submit">Salvar</button>
                            <button class="red-button" type="button" onclick="location.href = '../disciplinas/listarDisciplinas.php'">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>