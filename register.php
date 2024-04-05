<?php
include "header.php";
session_start();

if(isset($_SESSION["username"])){
header("location: todo.php?username=$_SESSION[username]");
}

if(isset($_POST['register'])){
include "./config.php";
$username = mysqli_real_escape_string($connect,$_POST['username']);
$password = $_POST['password'];
$confirmPassword = $_POST['cpassword'];
$check_sql = "select username,password from todousers where username = '{$username}' and password='{$password}'";
$result = mysqli_query($connect,$check_sql) or die("Query failed");

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
                                        session_start();
                                        $_SESSION["username"] = $row['username'];
                                        $_SESSION["password"] = $row['password'];
                                        header("location: todo.php?username=$row[username]");
                                    }
}
else{
    $insert_sql = "insert into todousers (username,password) values ('{$username}','{$password}')";
        if(mysqli_query($connect,$insert_sql)){
            header("Location: login.php");
        }
        else{
        echo "kya hua";
        header("Location: register.php");
        }
}

}
?>
    <nav>
        <?php 
            include "logo.php";
        ?>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <main>
        <h1 class="login">Register</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <p>
            <label for="username">Username </label><br />
            <input type="text" name="username" id="username" autocomplete="off" required placeholder="Username..." autofocus/>
        </p>
        <p>
            <label for="password">Password </label><br />
            <input type="password" name="password" id="password" autocomplete="off" required placeholder="Password..."/>
        </p>
        <p>
            <label for="confirm-password">Confirm Password </label><br />
            <input type="password" name="cpassword" id="confirm-password" autocomplete="off" required placeholder="Confirm Password..."/>
        </p>
        <input id="register" class="register" type="submit" name="register" value="Register"> 
        </form>
    </main>
    <script>
const register = document.getElementById("register");
const password = document.getElementById("password").value;
const confirmPassword = document.getElementById("confirm-password").value;

register.addEventListener("click",(e)=>{
    console.log(password,confirmPassword);
    if(password!==confirmPassword){
        e.preventDefault;
    }
    else{
        console.log("password matched")
    }
})
    </script>
<?php 
include "footer.php";
?>