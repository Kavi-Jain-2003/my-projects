<!-- some text is copied from admin_page to update,orders,users,contact of admin-->
<?php

@include 'config.php';

session_start();

$admin_id=$_SESSION['admin_id'];

if(!isset($admin_id))
{
    header('location:login.php');
};
// 21

if(isset($_POST['update_product']))
{
    $update_p_id=$_POST['update_p_id'];
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $price=mysqli_real_escape_string($conn, $_POST['price']);
    $details=mysqli_real_escape_string($conn, $_POST['details']);

    mysqli_query($conn, "UPDATE `products` SET name='$name', details='$details', price='$price' WHERE id='$update_p_id'") or die('query failed');

    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder='uploaded_img/'.$image;
    $old_image=$_POST['update_p_image'];

    if(!empty($image))
    {
        if($image_size>2000000)
        {
            $message[]='image file is too large!';
        }
        else
        {
            mysqli_query($conn, "UPDATE `products` SET image='$image' WHERE id='$update_p_id'") or die('query failed');
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('uploaded_img/'.$old_image);
            $message[]='image updated successfully';
        }
    }
    $message[]='product updated successfully';
}
?>
<!-- next to admin_orders.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update product</title>

    <link rel="stylesheet" href="css/admin_style.css">
</head>

<body>

<?php @include 'admin_header.php'; ?>
<!-- 20 -->
<section class="update-product">
    
    <?php
    // $_GET['update']='';
    $update_id=$_GET['update'];
    $select_products=mysqli_query($conn,"SELECT * FROM `products` WHERE id='$update_id'")or die('query failed');
    if(mysqli_num_rows($select_products)>0)
    {
        while($fetch_products=mysqli_fetch_assoc($select_products))
        {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="image">
        <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="update_p_id">
        <input type="hidden" value="<?php echo $fetch_products['image']; ?>" name="update_p_image">
        <input type="text" class="box" value="<?php echo $fetch_products['name']; ?>" required placeholder="update product name" name="name">
        <input type="number" min="0" class="box" value="<?php echo $fetch_products['price']; ?>" required placeholder="update product price" name="price">
        <textarea name="details" class="box" required placeholder="update product details" cols="30" rows="10"><?php echo $fetch_products['details']; ?></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" name="image">
        <input type="submit" value="update product" name="update_product" class="btn">
        <a href="admin_products.php" class="option-btn">go back</a>
    </form>
    <?php

        }
    }
    else
    {
       echo '<p class="empty">no update product selected</p>';
    }

    ?>
</section>

<script src="js/admin_script.js"></script>
</body>

</html>
