<!-- copied from register.php -->
<?php

@include 'config.php';

// 7
session_start();

if(isset($_POST['submit']))
{
    // these 2 lines are important for extra security purpose in form

    $filter_email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email=mysqli_real_escape_string($conn, $filter_email);

    $filter_pass=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $pass=mysqli_real_escape_string($conn, md5($filter_pass));

    $select_users=mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email' AND password='$pass'") or die('query failed');
// 8
    if(mysqli_num_rows($select_users)>0)
    {
        $row=mysqli_fetch_assoc($select_users);

        if($row['user_type']=='admin')
        {
            $_SESSION['admin_name']=$row['name'];
            $_SESSION['admin_email']=$row['email'];  
            $_SESSION['admin_id']=$row['id'];
            header('location:admin_page.php');
        }
        elseif($row['user_type']=='user')
        {
            $_SESSION['user_name']=$row['name'];
            $_SESSION['user_email']=$row['email'];  
            $_SESSION['user_id']=$row['id'];
            header('location:home.php');
        }
    }
    else
    {
        $message[]='incorrect email or password';
    }
}
?> 
<!-- next to admin_page.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>

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
<!-- 6 -->
    <section class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <input type="email" name="email" class="box" placeholder="enter your email" required>
            <input type="password" name="pass" class="box" placeholder="enter your password" required>
            <input type="submit" name="submit" class="btn" value="login now">
            <p>don't have an account? <a href="register.php">register now </a></p>
        </form>
    </section>

</body>
</html>
