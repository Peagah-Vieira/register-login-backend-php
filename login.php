<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="node_modules/toastr/build/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="node_modules/toastr/toastr.js"></script>
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img//undraw_secure_login_pdn4.svg" alt="">
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="input-a">
                        <a href="forgot.php">Esqueci minha senha</a>
                    </div>
                <div class="continue-button">
                    <button><a href="#">Logar</a></button>
                </div>
            </form>
        </div>
    </div>
<?php include('assets/php/blogin.php'); ?>
</body>

</html>