<?php
$gender = 0;
$gender = isset($_POST['gender']) ? $_POST['gender'] : 0;
switch($gender){
    case "female":
        $gender = "Female";
        break;
    case "male":
        $gender = "Male";
        break;
    case "others":
        $gender = "Others";
        break;
    case "none":
        $gender = "None";
        break;
}
?>