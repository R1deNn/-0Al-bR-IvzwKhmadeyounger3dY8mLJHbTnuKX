<?
    session_start();
    session_destroy();
    header('Location:http://localhost/made_young/index.php');
    exit;
?>