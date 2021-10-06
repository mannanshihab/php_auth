<?php

  	include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

    use PHP\Data;
    $_product = new Data();
    $product = $_product->delete();

?>
