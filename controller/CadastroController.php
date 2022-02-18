<?php
    include('../database/connection.php');

    $usuario = $_POST['user'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($usuario && $password && ($password == $confirmPassword)){
        try{
            $sql = "call cadastrar(:usuario, :senha)";/*Comando SQL*/
            $inserir = $conn->prepare($sql);/*Preparando comando SQL*/
            $inserir->bindParam(":usuario", $usuario);
            $inserir->bindParam(":senha", $password);

            $result = $inserir->execute();

            if (!$result){
                var_dump($inserir->errorInfo());
            }else{
                echo "
                <script type='text/javascript'>
                    alert('Usuário cadastrado!');
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/index.php'>";
            }
        }
        catch (PDOException $error) {
            echo "Error:" . $error->getMessage();
        }
    }
    else{
        echo "
        <script type='text/javascript'>
            alert('Usuário ou senha inválidos');
        </script>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=/cadastro.php'>";
    }
?>