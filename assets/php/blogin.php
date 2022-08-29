<?php
session_start();
if(isset($_POST['email'],$_POST['password'])){
    $conexao = new PDO("mysql:host=localhost;dbname=formulario", "root","");
    $email = $_POST['email'];  
    $password = $_POST['password']; 

    $stm = $conexao->query("SELECT email FROM contato WHERE email='$email'");
    $stmt = $conexao->query("SELECT password FROM contato WHERE password='$password'");
    $db_email = $stm->fetch(PDO::FETCH_ASSOC);
    $db_password = $stmt->fetch(PDO::FETCH_ASSOC);

    if(strlen("$password") < 7){
        echo "<script type='text/javascript'>toastr.warning('Senha não pode ser menor do que <b>7</b> dígitos!', 'Situação', {
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
    else if(isset($db_email['email']) == "$email" && isset($db_password['password']) == "$password"){
        $stm = $conexao-> prepare('INSERT INTO login_history(email,password) VALUES (:email,:password)');
        $stm->bindParam('email', $email);
        $stm->bindParam('password', $password);
        $stm->execute();
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
    }
    else if($_SESSION['count'] > 5){
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
        if(!isset($_SESSION['start'])){
            $initial = new DateTime();
            $_SESSION['start'] = $initial;
            $_SESSION['end'] = $initial->add(new DateInterval('PT30S'));
        }
        else{
            $now = new DateTime();
            if($_SESSION['end'] <= $now){
                $_SESSION['count'] = 0;
                unset($_SESSION['start']);
                unset($_SESSION['end']);
            }
        }
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
        $_SESSION['count'] ++;
    }
}