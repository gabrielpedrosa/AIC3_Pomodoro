<?php
    include('../database/connection.php');

    $disciplinas = $_POST['disciplinas'];

    

    foreach($disciplinas as $disciplina){
        $id = (int) $disciplina;
        $stats = 1;
        try{
            $sql = "call atualizar_disciplina(:disciplinas, :stats)";/*Comando SQL*/
            $inserir = $conn->prepare($sql);/*Preparando comando SQL*/
            $inserir->bindParam(":disciplinas", $id);
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
            alert('Disciplina atualizada!');
        </script>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/view/disciplinas/listarDisciplinas.php'>";
?>