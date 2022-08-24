<?php
session_start();
include("../connect.php");

if(isset($_GET["col"])){
	$query = $mysql->query("SELECT * FROM user WHERE username = '".$_SESSION["username"]."'");
	if($data = $query->fetch_array(MYSQLI_ASSOC)){
		$ref["query"] = $mysql->query("SELECT * FROM ref WHERE ref = '".$_GET["col"]."'");
		if($ref["data"] = $ref["query"]->fetch_array(MYSQLI_ASSOC)){
//echo $ref["data"]["point"];

$usertime = $data["btn".$ref["data"]["btn"]];
if($usertime-time()<-86400){
$user["query"] = $mysql->query("UPDATE user SET nn = nn + '".$ref["data"]["point"]."', btn".$ref["data"]["btn"]." = '".time()."' WHERE username = '".$_SESSION["username"]."'");
header("Location: ../../index.php?page=shop");
exit();
}
header("Location: ../../index.php?page=shop");
exit();


		}
	}
}
//echo $_GET["col"];