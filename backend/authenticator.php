<?php
    $is_authenticated = $_SESSION['is_authenticated'];
    
    if(!$is_authenticated)
    {
        header('location:'.$webroot.'');
    }
?>
