<?php
if(isset($_POST['email'],$_POST['number'])){
    $conexao = new PDO("mysql:host=localhost;dbname=formulario", "root","");
    $email = $_POST['email'];  
    $number= $_POST['number']; 

    $stm = $conexao->query("SELECT email FROM contato WHERE email='$email' and number='$number'");
    $stmt = $conexao->query("SELECT number FROM contato WHERE email='$email' and number='$number'");
    $db_email = $stm->fetch(PDO::FETCH_ASSOC);
    $db_number = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($db_email['email']) == "$email" && isset($db_number['number']) == "$number"){
        header("Refresh: 5;url=https://www.google.com");
        echo "<script type='text/javascript'>toastr.success('Você receberá uma mensagem no seu celular em alguns instantes!', 'Situação', {
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
    else if(isset($db_email['email']) != "$email" or isset($db_number['number']) != "$number"){
        echo "<script type='text/javascript'>toastr.error('E-mail ou número incorreto!', 'Situação', {
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