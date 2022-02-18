<?php
    include('../../database/connection.php');

    $tarefa = $_GET['tarefa'];
    

    try{
        $sql  = "select * from select_tarefas where id = :tarefa;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":tarefa", $tarefa);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($rows){
            $tarefas = $rows[0];
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
    <link rel="stylesheet" href="../../css/fazerTarefa.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="work-container">
            <div class="work-container-timers">
                <div class="work-container-timers-timer">
                    <div class="work-container-timers-timer-title">
                        <h2>Timer</h2>
                    </div>
                    <div class="work-container-timers-timer-display">
                        <label for="">25:00 min</label> 
                    </div>
                    <div class="work-container-timers-timer-buttons">
                        <button>Play</button>
                        <button>Pause</button>
                        <button>Stop</button>
                    </div>
                </div>
                <div class="work-container-timers-descanso">
                    <div class="work-container-timers-descanso-title">
                        <h2>Descanso</h2>
                    </div>
                    <div class="work-container-timers-descanso-display">
                        <label for="">05:00 min</label>
                    </div>
                    <div class="work-container-timers-descanso-buttons">
                        <button>Play</button>
                        <button>Pause</button>
                        <button>Stop</button>
                    </div>
                </div>
            </div>
            <div class="work-container-tarefa">
                <div class="work-container-tarefa-title">
                    <h2>Apoio à Tarefa - <?php echo $tarefas->nome ?></h2>
                </div>
                <div class="work-container-tarefa-descricao">
                    <textarea id="description" name="description" type="text" required value=""><?php echo $tarefas->descricao ?></textarea>
                    <label for="description" style="margin-top: -30px">Descrição</label>
                </div>
            </div>

        </div>

    </div>
</body>
</html>