<!-- 12 -->
<?php
if(isset($message))
{
    foreach($message as $message)
    {
        echo '
        <div class="message">
          <span>'.$message.'</span>
          <img src="cross2.jpg" class="bx bx-basket" onclick="this.parentElement.remove();">
        </div>
        ';
    }
}

?>
<!-- 13 -->
<header class="header">
    <div class="flex">
        <a href="admin_page.php" class="logo">MY<span>CAFE</span> admin <span>panel</span></a>
        <nav class="navbar">
            <a href="admin_page.php">home</a>
            <a href="admin_products.php">products</a>
            <a href="admin_orders.php">orders</a>
            <a href="admin_users.php">users</a>
            <a href="admin_contacts.php">messages</a>
        </nav>

        <div class="icons">
            <img id="menu-btn" class="fas fa-bars" src="sidebar.png" width="30px" height="30px">
            <img id="user-btn" class="fas fa-user" src="user.JPG" width="30px" height="30px">
        </div>

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
            <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>            
        </div>
    </div>
</header>
<!--admin_script.js-->
<!-- admin_page.php -->