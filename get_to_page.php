<?php 
session_start();
if(isset($_SESSION["username"])){
// header("Location: todo.php");
header("location: todo.php");
}
else{
    header("location: index.php");
    exit;
}

?>