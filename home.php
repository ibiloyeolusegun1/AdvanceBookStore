<?php

    include 'config.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_cart_numbers) > 0){
            $message[] = 'Already added to cart';
        }else{
            mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
            $message[] = 'Product added to cart successfully';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--Font Awesome Link-->
    <link rel="stylesheet" href="css/all.css.css">

    <!--================ SWIPERS CSS ================-->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!--Custom CSS Link-->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'header.php'; ?>
    
    <!--==================== Home_Banner Section Start ====================-->
    <section class="home">
        <div class="content">
            <h3>Hand picked book to your door.</h3>
            <p>Over 1 million books ready to be delivered at your doorsteps 85,000 eBooks and 20,000 audiobooks to download right now! Curbside pickup available in most stores!</p>
            <a href="about.php" class="white-btn">discover more</a>
        </div>
    </section>
    <!--==================== Home_Banner Section End ====================-->


     <!--==================== Home About Section Start ====================-->
     <section class="about-home">
        <div class="flex">

            <div class="image">
                <img src="images/about.jpg" alt="">
            </div>

            <div class="content">
                <h3>about us</h3>
                <p>We offer a tremendous gathering of books in the various classifications of Fiction, Non-fiction, Biographies, History, Religions. We likewise move in immense accumulation of Investments and Management, Computers, Engineering, Medical, College and School content references books proposed by various foundations as schedule the nation over.</p>
                <!-- <p>Discover the best books to read right now including trending titles, bookseller recommendations, new releases and more.</p> -->
                <a href="about.php" class="btn">read more</a>
            </div>

        </div>
    </section>
    <!--==================== Home About Section End ====================-->


    <!--==================== Home New Arrival Section Start ====================-->
    <!-- <section class="new-arrival">
        <h1 class="title">new arrival</h1>
        <div class="box-container">

            <div class="image-box">
                <img src="images/about.jpg" alt="">
            </div>
            <div class="box">
                <div class="swiper arrival-wrapper">
                    <div class="arrival-content">
                        <div class="swiper-wrapper">
                            
                            <div class="arrival-item swiper-slide">
                                <img src="images/New_Arrivals1_The-Swordwoman.jpeg" alt="">
                                <h3>The swordwoman</h3>
                            </div>
                            
                            <div class="arrival-item swiper-slide">
                                <img src="images/New_Arrivals2_The-Fireraisers.jpeg" alt="">
                                <h3>The fireraisers</h3>
                            </div>
                            
                            <div class="arrival-item swiper-slide">
                                <img src="images/New_Arrivals3_The-Reluctant-Coroner.jpg" alt="">
                                <h3>The reluctant coroner</h3>
                            </div>
                            
                            <div class="arrival-item swiper-slide">
                                <img src="images/New_Arrivals4_Induction.jpg" alt="">
                                <h3>Induction</h3>
                            </div>
                            
                            <div class="arrival-item swiper-slide">
                                <img src="images/New_Arrivals5_A-Mersey-Killing.jpeg" alt="">
                                <h3>A mersey killing</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>

    </section> -->
    <!--==================== Home New Arrival Section End ====================-->



    <!--==================== Home Section Start ====================-->
    <section class="home-product">
        <h1 class="title">new product</h1>
        <div class="box-container">
            <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){    
            ?>
           <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">&#8358; <?php echo $fetch_products['price']; ?></div>
                <input type="number" name="product_quantity" min="1" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" name="add_to_cart" value="add to cart" class="btn">
           </form>
            <?php
                  }
                }else{
                    echo ' <p class="empty">No product added yet!</p>';
                }
            ?>
        </div>
        <div class="load-more" style="margin-top: 1rem; text-align: center;">
                <a href="shop.php" class="option-btn">load more</a>
        </div>
    </section>
    <!--==================== Home Section End ====================-->


    <!--==================== Home-Contact Section Start ====================-->
    <section class="home-contact">
        <div class="content">
            <h3>Have any question?</h3>
            <p>We want to thank you for shopping with us. You can keep in touch with us for any questions or mismanagement of our produts in other for use to achieve our aim.</p>
            <a href="contact.php" class="white-btn">contact us</a>
        </div>
    </section>
    <!--==================== Home-Contact Section End ====================-->


   










    <?php include 'footer.php'; ?>


    <!--================ SWIPERS JS ================-->
    <script src="js/swiper-bundle.min.js"></script>

    <!-- Custom Admin JS File -->
    <script src="js/script.js"></script>
</body>
</html>