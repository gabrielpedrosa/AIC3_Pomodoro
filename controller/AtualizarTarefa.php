<?php
    include('../database/connection.php');

    $homework = $_POST['tarefas'];

    

    foreach($homework as $home){
        $id = (int) $home;
        $stats = 1;
        try{
            $sql = "call atualizar_tarefa(:homework, :stats)";/*Comando SQL*/
            $inserir = $conn->prepare($sql);/*Preparando comando SQL*/
            $inserir->bindParam(":homework", $id);
            $inserir->bindParam(":stats", $stats);
            $result = $inserir->execute();

            if (!$result){
                var_dump($inserir->errorInfo());
            }else{
                
            }
        }
        catch (PDOException $error) {
            echo "Error:" . $error->getMessage();
        }
    }

    echo "
        <script type='text/javascript'>
            alert('Tarefa atualizada!');
        </script>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/view/disciplinas/listarDisciplinas.php'>";
?>