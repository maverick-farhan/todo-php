<?php
include './config.php';
$id = $_GET['id'];
$sql = "delete from todolist where id={$id}";
$result = mysqli_query($connect, $sql) or die("Query failed to fetch");

header("Location: todo.php");
mysqli_close($connect);
?>