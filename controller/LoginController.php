<?php
    include('../database/connection.php');

    $usuario = $_POST['user'];
    $password = $_POST['password'];

    if($usuario && $password){
        try{
            $sql  = "select * from select_login where usuario = :user and senha = :password;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":user", $usuario);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $rows = $stmt->fetchAll();

            if($rows){
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/view/disciplinas/listarDisciplinas.php'>";
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
    }
?>