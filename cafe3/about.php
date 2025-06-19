<?php

@include 'config.php';

session_start();

$user_id=$_SESSION['user_id'];

if(!isset($user_id))
{
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php @include 'header.php';  ?>
<!-- 40 -->
    <section class="heading">
        <h3>about us</h3>
        <p><a href="home.php">home</a> / about</p>
    </section>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/mycafe1.jpg">
            </div>
            <div class="content">
                <h3>why choose us?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <a href="shop.php" class="btn">shop now</a>
            </div>
        </div>

        <div class="flex">
            <div class="content">
                <h3>what we provide?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>
            <div class="image">
                <img src="images/mycafe2.jpg">
            </div>
        </div>

        <div class="flex">
            <div class="image">
                <img src="images/mycafe3.png">
            </div>
            <div class="content">
                <h3>who we are?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <a href="#reviews" class="btn">clients reviews</a>
            </div>
        </div>
    </section>

    <section class="reviews" id="reviews">
        <h1 class="title">client's reviews</h1>
        <div class="box-container">
            <div class="box">
                <img src="images/user1.png">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <div class="stars">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/unratedstar.JPG" class="fas fa-star">
                </div>
                <h3>Mary</h3>
            </div>

            <div class="box">
                <img src="images/user3.png">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <div class="stars">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/unratedstar.JPG" class="fas fa-star">
                </div>
                <h3>John Doe</h3>
            </div>

            <div class="box">
                <img src="images/user2.png">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <div class="stars">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/unratedstar.JPG" class="fas fa-star">
                </div>
                <h3>Jennifer</h3>
            </div>        

            <div class="box">
                <img src="images/user4.png">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <div class="stars">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/unratedstar.JPG" class="fas fa-star">
                </div>
                <h3>John Doe</h3>
            </div>

            <div class="box">
                <img src="images/user5.png">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <div class="stars">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/unratedstar.JPG" class="fas fa-star">
                </div>
                <h3>John Doe</h3>
            </div>

            <div class="box">
                <img src="images/user6.png">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eligendi tenetur commodi minima quod voluptates!</p>
                <div class="stars">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/ratedstar.JPG" class="fas fa-star">
                    <img src="images/unratedstar.JPG" class="fas fa-star">
                </div>
                <h3>John Doe</h3>
            </div>
        </div>
    </section>

    <?php @include 'footer.php';  ?>

    <script src="script.js"></script>
</body>
</html>
<!-- shop.php -->