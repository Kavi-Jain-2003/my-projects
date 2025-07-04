<?php

@include 'config.php';
 
session_start();

$user_id=$_SESSION['user_id'];

if(!isset($user_id))
{
    header('location:login.php');
};
// 49
if(isset($_GET['delete']))
{
    $delete_id=$_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id='$delete_id'") or die('query failed');
    header('location:cart.php');
}
if(isset($_GET['delete_all']))
{
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id'") or die('query failed');
    header('location:cart.php');
};

if(isset($_POST['update_quantity']))
{
    $cart_id=$_POST['cart_id'];
    $cart_quantity=$_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity='$cart_quantity' WHERE id='$cart_id'") or die('query failed');
    $message[]='cart qunatity updated';
}
?>
<!-- checkout.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php @include 'header.php';  ?>
<!-- 48 -->
    <section class="heading">
        <h3>shopping-cart</h3>
        <p><a href="home.php">home</a> / cart</p>
    </section>

    <section class="shopping-cart">
        <h1 class="title">products added</h1>
        <div class="box-container">
            <?php
             $grand_total=0;
             $select_cart=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
             if(mysqli_num_rows($select_cart)>0)
             {
                while($fetch_cart=mysqli_fetch_assoc($select_cart))
                {
            ?>

            <div class="box">
                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"><img src="cross2.jpg" width="25px" height="25px"></a>
                <a href="view_page.php?pid=<?php echo $fetch_cart['pid']; ?>" class="fas fa-eye"><img src="santa.JPG" width="28px" height="28px"></a>
                <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" class="image">
                <div class="name"><?php echo $fetch_cart['name']; ?></div>
                <div class="price">Rs<?php echo $fetch_cart['price']; ?>/-</div>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
                    <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="cart_quantity" class="qty">
                    <input type="submit" value="update" class="option-btn" name="update_quantity">
                </form>
                <div class="sub-total">
                    Sub-total: <span>Rs<?php echo $sub_total =($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> 
                </div>
        
            </div>
            <?php
            $grand_total+=$sub_total;
                }
            }
            else
            {
             echo '<p class="empty">your cart is empty</p>';
            }
            ?>
        </div>

        <div class="more-btn">
            <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from cart?');">delete all</a>
        </div>
        <div class="cart-total">
            <p>Grand Total : <span>Rs<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class="option-btn">continue shopping</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled' ?>">proceed to checkout</a>
        </div>
        </section>

    <?php @include 'footer.php';  ?>

    <script src="script.js"></script>
</body>
</html>
