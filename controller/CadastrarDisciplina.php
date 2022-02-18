<?php
    include('../database/connection.php');

    $discipline = $_POST['discipline'];
    $description = $_POST['description'];

    if($discipline && $description){
        try{
            $sql = "call cadastrar_disciplinas(:discipline, :description, 0)";/*Comando SQL*/
            $inserir = $conn->prepare($sql);/*Preparando comando SQL*/
            $inserir->bindParam(":discipline", $discipline);
            $inserir->bindParam(":description", $description);

            $result = $inserir->execute();

            if (!$result){
                var_dump($inserir->errorInfo());
            }else{
                echo "
                <script type='text/javascript'>
                    alert('Disciplina cadastrado!');
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