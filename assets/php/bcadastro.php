<?php
include('assets/php/gender.php');
$firstname = 0;
$lastname = 0;
$email = 0;
$number = 0;
$password = 0;
$confirmPassword = 0;

if(isset($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['number'],$_POST['password'],$_POST['confirmPassword'])){
    $conexao = new PDO("mysql:host=localhost;dbname=formulario", "root",""); 

    $firstname = filter_input(INPUT_POST,"firstname", FILTER_SANITIZE_STRING); 
    $lastname = filter_input(INPUT_POST,"lastname", FILTER_SANITIZE_STRING); 
    $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL); 
    $number = filter_input(INPUT_POST,"number", FILTER_SANITIZE_STRING); 
    $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_STRING);
    $confirmPassword = filter_input(INPUT_POST,"confirmPassword", FILTER_SANITIZE_STRING);

    $stm = $conexao->query("SELECT email FROM contato WHERE email='$email'");
    $stmt = $conexao->query("SELECT number FROM contato WHERE number='$number'");
    $db_email = $stm->fetch(PDO::FETCH_ASSOC);
    $db_number = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$firstname || !$lastname || !$email || !$number || !$password || !$gender){ 
        echo "<script type='text/javascript'>toastr.warning('Dados Inválidos!', 'Situação', {
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
    else if(strlen("$password") < 7){
        if(strlen("$password") < 7 && strlen("$number") < 13){
            echo "<script type='text/javascript'>toastr.warning('Senha menor do que <b>7</b> dígitos e número menor do que <b>12</b> dígitos!', 'Situação', {
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
        else{
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
    }
    else if(strlen("$number") < 13){
        echo "<script type='text/javascript'>toastr.warning('Número não pode ser menor do que <b>12</b> dígitos!', 'Situação', {
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
    else if($password !== $confirmPassword){ 
        echo "<script type='text/javascript'>toastr.warning('Senhas diferentes!', 'Situação', {
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
    else if($email == isset($db_email['email'])){ 
        if($number == isset($db_number['number'])){ 
            echo "<script type='text/javascript'>toastr.warning('E-mail e número já registrados!', 'Situação', {
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
        else{ 
            echo "<script type='text/javascript'>toastr.warning('E-mail já registrado!', 'Situação', {
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
    }
    else if($number == isset($db_number['number'])){ 
        echo "<script type='text/javascript'>toastr.warning('Número já cadastrado!', 'Situação', {
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
    else{  
        $stm = $conexao-> prepare('INSERT INTO contato(firstname,lastname,email,number,password,gender) VALUES (:firstname,:lastname,:email,:number,:password,:gender)'); 
        $stm->bindParam('firstname', $firstname);
        $stm->bindParam('lastname', $lastname);
        $stm->bindParam('email', $email);
        $stm->bindParam('number', $number);
        $stm->bindParam('password', $password);
        $stm->bindParam('gender', $gender);
        $stm->execute();
        header("Refresh: 5;url=login.php");
        echo "<script type='text/javascript'>toastr.success('Dados Cadastrados, você será redirecionado em 5 segundos!', 'Situação', {
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
}