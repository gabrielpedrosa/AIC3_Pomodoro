<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/adicionarTarefa.css">
    <title>Adicionar Disciplina</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-container-box">
                <div class="form-container-box-title">
                    <h2>Nova Disciplina</h2>
                </div>
                <form action="../../controller/CadastrarDisciplina.php" method="post">
                    <div class="form-container-box-form">
                        <div class="form-container-box-form-field_group">
                            <input id="discipline" name="discipline" type="text" required />
                            <label for="discipline">Disciplina</label>
                        </div>
                        <div class="form-container-box-form-field_group">
                            <textarea id="description" name="description" type="text" required ></textarea>
                            <label for="description">Descrição</label>
                        </div>
                        <div class="form-container-box-form-button_group">
                            <button type="submit">Salvar</button>
                            <button class="red-button" type="button" onclick="location.href = 'listarDisciplinas.php'">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>