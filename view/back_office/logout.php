<?php
include_once '../../Model/admin.php';
include_once '../../Controller/adminC.php';
$adminC = new adminC();
$adminC->setDisconn();
header('Location:../front_office/login.php');
