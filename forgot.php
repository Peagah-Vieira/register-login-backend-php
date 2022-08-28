<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/forgot.css">
    <link href="node_modules/toastr/build/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="node_modules/toastr/toastr.js"></script>
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img//undraw_forgot_password_re_hxwm.svg" alt="">
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Problemas?</h1>
                    </div>
                </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="tel" name="number" placeholder="(xx) xxxx-xxxx" required>
                    </div>
                <div class="continue-button">
                    <button><a href="#">Recuperar</a> </button>
                </div>
            </form>
        </div>
    </div>
<?php include('assets/php/bforgot.php'); ?>
</body>

</html>