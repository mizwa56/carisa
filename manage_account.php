<?php
include 'db_connect.php';

if(!isset($_SESSION['login_id'])){
    header("location: index.php");
}
else if($_GET['id'] != $_SESSION['login_id']){
    $_SESSION['alert'] = ["Invalid request.", "warning"];
    header("location: index.php");
}

$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}

include 'sign_up.php';
?>