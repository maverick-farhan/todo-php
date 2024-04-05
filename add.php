<?php 
include "./config.php";
$todo = $_POST['todo'];
if(isset($_POST["add"])){
if(mysqli_query($connect,"describe `todolist`")){
    $sql = "insert into todolist (todolists) values ('{$todo}')";
    mysqli_query($connect, $sql) or die("Query failed to fetch");
    mysqli_close($connect);
    }
    else{
        mysqli_query($connect,"create table todolist (id int(11) not null auto_increment primary key,todolists varchar(255) not null);
        insert into todolist (todolists) values ('{$todo}');
        ");
    }
}
header("location: todo.php");
exit;
?>