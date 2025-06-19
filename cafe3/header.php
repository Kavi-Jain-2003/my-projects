<?php
// 28
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
//move to home.php
?>
<!-- 30 -->
<header class="header">
    <div class="flex">
        <a href="home.php" class="logo">My<span>Cafe</span></a>
        <nav class="navbar">
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="#">pages +</a>
                    <ul>
                        <li><a href="about.php">about</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                </li>
                <li><a href="shop.php">shop</a></li>
                <li><a href="orders.php">orders</a></li>
                <li><a href="#">account +</a>
                    <ul> 
                        <li><a href="login.php">login</a></li>
                        <li><a href="register.php">register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- next to logout.php -->
        <!-- 32 -->
        <div class="icons">
            <img src="sidebar.png" id="menu-btn" class="fas fa-bars" width="25px" height="25px">
            <a href="search_page.php" class="fas fa-search"><img src="search4.JPG" width="25px" height="25px"></a>
            <img src="user.JPG" id="user-btn" class="fas fa-user" width="25px" height="25px">
            
            <?php
               $select_wishlist_count=mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');
               $wishlist_num_rows=mysqli_num_rows($select_wishlist_count);
            ?>            
            <a href="wishlist.php" class="fas fa-heart"><img src="heart3.JPG" width="25px" height="25px"><span>(<?php echo $wishlist_num_rows; ?>)</span></a>

            <?php
               $select_cart_count=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
               $cart_num_rows=mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php" class="fas fa-shopping-cart"><img src="basket.JPG" width="25px" height="25px"><span>(<?php echo $cart_num_rows; ?>)</span></a>

        </div>
        <!-- 33 -->
        <div class="account-box">
            <p>username: <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email: <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
            <!-- script.js -->
        </div>
    </div>
</header>
<!-- next to footer.php -->