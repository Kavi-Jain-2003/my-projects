<?php

@include 'config.php';

session_start();

$user_id=$_SESSION['user_id'];

if(!isset($user_id))
{
    header('location:login.php');
}
// 47
if(isset($_POST['add_to_cart']))
{
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=1;

    $check_cart_numbers=mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers)>0)
    {
        $message[]='already added to cart';
    }
    else
    {
        $check_wishlist_numbers=mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers)>0)
        {
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');
        }
        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[]='product added to cart successfully!';
    }
}
if(isset($_GET['delete']))
{
    $delete_id=$_GET['delete'];
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE id= '$delete_id'") or die('query failed');
    header('location:wishlist.php');
}
if(isset($_GET['delete_all']))
{
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id= '$user_id'") or die('query failed');
    header('location:wishlist.php');
}
?>
<!-- cart.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wishlist</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php @include 'header.php';  ?>
<!-- 46 -->
    <section class="heading">
        <h3>your wishlist</h3>
        <p> <a href="home.php">home</a> / wishlist</p>
    </section>

    <section class="wishlist">
        <h1 class="title">products added</h1>
        <div class="box-container">
            <?php
              $grand_total=0;
              $select_wishlist=mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'")or die('query failed');
              if(mysqli_num_rows($select_wishlist)>0)
              {
                while($fetch_wishlist=mysqli_fetch_assoc($select_wishlist))
                {            
            ?>
            <form action="" method="POST" class="box">
                <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from wishlist?');"><img src="cross2.jpg" width="25px" height="25px"></a>

                <a href="view_page.php?pid=<?php echo $fetch_wishlist['pid']; ?>" class="fas fa-eye"><img src="santa.JPG" width="25px" height="28px"></a>

                <img src="uploaded_img/<?php echo $fetch_wishlist['image']; ?>" class="image">

                <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
                <div class="price">Rs<?php echo $fetch_wishlist['price']; ?>/-</div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['pid']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            <?php
            $grand_total += $fetch_wishlist['price'];
                }

              }
              else
              {
                echo '<p class="empty">your wishlist is empty</p>';
              }
              ?>
        </div>
        <div class="wishlist-total">
            <p>Grand Total : <span>Rs<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class="option-btn">continue shopping</a>
            <a href="wishlist.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from wishlist?');">delete all</a>

        </div>
    </section>

    <?php @include 'footer.php';  ?>

    <script src="script.js"></script>
</body>
</html>