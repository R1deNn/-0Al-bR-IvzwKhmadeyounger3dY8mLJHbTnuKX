<?php
include_once './vendor/models/main_user.php';
$id = $_SESSION['id'];
$user = getInfoLoggedUser($id);