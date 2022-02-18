<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIC3 - Cadastro</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-container-box">
                <div class="form-container-box-title">
                    <h2>Cadastre-se</h2>
                </div>
                <div class="form-container-box-form">
                    <div class="form-container-box-form-field_group">
                        <input id="user" name="user" type="text" required />
                        <label for="user">Usuário</label>
                    </div>
                    <div class="form-container-box-form-field_group">
                        <input id="password" name="password" type="password" required />
                        <label for="password">Senha</label>
                    </div>
                    <div class="form-container-box-form-field_group">
                        <input id="confirmPassword" name="confirmPassword" type="password" required />
                        <label for="confirmPassword">Confirmar Senha</label>
                    </div>
                    <div class="form-container-box-form-show_password">
                        <input id="showPassword" name="showPassword" type="checkbox" required />
                        <label for="showPassword">Exibir Senha</label>
                    </div>
                    <div class="form-container-box-form-button_group">
                        <button>Cadastrar</button>
                        <a href="index.php">Já tem cadastro? Entre</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>