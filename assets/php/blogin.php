<?php
$db_fail = 0;

if(isset($_POST['email'],$_POST['password'])){
    $conexao = new PDO("mysql:host=localhost;dbname=formulario", "root","");
    $email = $_POST['email'];  
    $password = $_POST['password']; 

    $stm = $conexao->query("SELECT email FROM contato WHERE email='$email'");
    $stmt = $conexao->query("SELECT password FROM contato WHERE password='$password'");
    $stmg = $conexao->query("SELECT fail FROM contato WHERE email='$email'");
    $db_email = $stm->fetch(PDO::FETCH_ASSOC);
    $db_password = $stmt->fetch(PDO::FETCH_ASSOC);
    $db_fail = $stmg->fetch(PDO::FETCH_ASSOC);

    if(isset($db_email['email']) == "$email" && isset($db_password['password']) == "$password"){
        header("Refresh: 5;url=https://www.google.com");
        echo "<script type='text/javascript'>toastr.success('Login efetuado, você será redirecionado em 5 segundos!', 'Situação', {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-bottom-left',
            'preventDuplicates': false,
            'onclick': null,
            'showDuration': '300',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut'
        });</script>";
        $stmf = $conexao->query("UPDATE contato SET fail = 0 WHERE email='$email'");
    }
    else if($db_fail['fail'] == 5){
        echo "<script type='text/javascript'>toastr.warning('Suas tentativas acabaram, você será bloqueado!', 'Situação', {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-bottom-left',
            'preventDuplicates': false,
            'onclick': null,
            'showDuration': '300',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut'
        });</script>";
    }
    else if(isset($db_email['email']) !== "$email" or isset($db_password['password']) !== "$password"){
        echo "<script type='text/javascript'>toastr.error('E-mail ou senha incorreto!', 'Situação', {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-bottom-left',
            'preventDuplicates': false,
            'onclick': null,
            'showDuration': '300',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut'
        });</script>";
        $stmf = $conexao->query("UPDATE contato SET fail = fail+1 WHERE email='$email'");
    }
}