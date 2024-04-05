<?php
include "header.php";
include "./config.php";
session_start();
if(!isset($_SESSION["username"])){
header("Location: todo.php");
exit;
}
?>
    <nav>
        <?php 
            include "logo.php";
        ?>
        <ul>
        
            <li><a href="#"><i class="fa-solid fa-user"></i> <?php echo $_SESSION["username"] ?></a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main style="display:flex;justify-content:center;flex-direction:column;">
        <form id="todo-form" action="add.php" method="post">
            <input type="text" required name="todo" id="todo" autocomplete="off" autofocus placeholder="rank push today?" />
            <input type="submit" value="add" id="todo-add" name="add"/>
        </form>
        <div class="todo-container">
        <?php
        include "./config.php";
        $show_sql = "select * from todolist order by id desc"; 
        $show_result = mysqli_query($connect,$show_sql) or die ("Failed to execute");
        if(mysqli_num_rows($show_result)>0){
            while($row = mysqli_fetch_assoc($show_result)){
            ?>
        <div class="todo-child">
            <input type="checkbox" name="check" id="check" />
            <input type="text" name="todo-text" id="todo-check" value="<?php echo $row['todolists'] ?>">
            <a id="delete-a" href="delete.php?id=<?php echo $row['id']?>"><input type="button" value="delete" id="todo-delete" name="delete"/></a>
        </div>
            <?php
            }
        }?>    
        
    </div>
</main>
<?php 
include "footer.php";
?>