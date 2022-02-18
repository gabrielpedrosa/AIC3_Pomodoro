<?php
    include('../database/connection.php');

    $homework = $_POST['homework'];
    $description = $_POST['description'];
    $discipline = $_POST['discipline'];

    if($discipline && $description){
        try{
            $sql = "call cadastrar_tarefas(:homework, :description, 0, :discipline)";/*Comando SQL*/
            $inserir = $conn->prepare($sql);/*Preparando comando SQL*/
            $inserir->bindParam(":homework", $homework);
            $inserir->bindParam(":description", $description);
            $inserir->bindParam(":discipline", $discipline);

            $result = $inserir->execute();

            if (!$result){
                var_dump($inserir->errorInfo());
            }else{
                echo "
                <script type='text/javascript'>
                    alert('Tarefa cadastrada!');
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/view/disciplinas/listarDisciplinas.php'>";
            }
        }
        catch (PDOException $error) {
            echo "Error:" . $error->getMessage();
        }
    }
    else{
        echo "
        <script type='text/javascript'>
            alert('Dados inválidos!');
        </script>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/cadastro.php'>";
    }
?>