<?php
include "header.php";
session_start();
if(isset($_SESSION["username"])){
// header("Location: todo.php");
$profile_name = $_SESSION["username"];
header("location: todo.php");
}

if(isset($_POST['login'])){
include "./config.php";
$username = mysqli_real_escape_string($connect,$_POST['username']);
$password =$_POST['password'];
$check_sql = "select username,password from todousers where username = '{$username}' AND password = '{$password}'";
$result = mysqli_query($connect,$check_sql) or die("Query failed");

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
                                        session_start();
                                        $_SESSION["username"] = $row['username'];
                                        $_SESSION["password"] = $row['password'];
                                        // header("location: todo.php");
                                        $profile_name = $row["username"];
                                        header("location: todo.php?username=$profile_name");
                                    }
}
mysqli_close($connect);
}


?>
    <nav>
        <?php 
            include "logo.php";
        ?>
        <ul>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <main>
        <h1 class="login">Sign In</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <p>
            <label for="username">Username </label><br />
            <input type="text" name="username" id="username" required autocomplete="off" placeholder="Username..." autofocus/>
        </p>
        <p>
            <label for="password">Password</label><br />
            <input type="password" name="password" required id="password" autocomplete="off" placeholder="Password..."/>
        </p> 
        <input id="login" class="login getstarted" name="login" type="submit" value="Login"> 
        </form>
    </main>
<?php 
include "footer.php";
?>