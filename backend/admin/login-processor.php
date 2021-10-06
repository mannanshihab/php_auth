<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/PHP/config.php');

    use PHP\Admin;

    $_name = $_POST['name'];
    $_password = $_POST['password'];

    function is_empty($value){
        if($value == ''){
            return true;
        }else{
            return false;
        }
    }

    if(empty($_name) || empty($_password)){

        session_start();

        $_SESSION['message'] = "User name can't be empty. Please enter user name";
        header("location:".$webroot."login.php");
    }

    else{
        
        $_admin = new Admin();
        $_admin->login($_name, $_password);
    }

?>
