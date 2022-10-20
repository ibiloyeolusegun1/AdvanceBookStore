<?php

    include 'config.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    };


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
    };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search page</title>

     <!--Font Awesome Link-->
     <link rel="stylesheet" href="css/all.css.css">

    <!--Custom CSS Link-->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'header.php'; ?>
    

    <!--====================Search Section Start ====================-->
    <div class="heading">
        <h3>search page</h3>
        <p><a href="home.php">Home</a>  / Search</p>
    </div>
    <!--====================Search Section End ====================-->


    <!--====================Search Form Section Start ====================-->
    <section class="search-form">

        <form action="" method="post">
            <input type="text" name="search" placeholder="search product..." class="box">
            <input type="submit" value="search" name="submit" class="btn">
        </form>

    </section>
    <!--====================Search Form Section End ====================-->


    <!--====================Search Products Section Start ====================-->
    <section class="products home-product" style="padding-top: 0;">

        <div class="box-container">
            <?php
                if(isset($_POST['submit'])){
                    $search_item = $_POST['search'];
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('query failed');
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
                        echo ' <p class="empty">No search result found!</p>';
                    } 
                }else{
                    echo '<p class="empty">Search for a product!</p>';
                }
            ?>
        </div>

    </section>
    <!--====================Search Products Section End ====================-->










    <?php include 'footer.php'; ?>

    <!-- Custom Admin JS File -->
    <script src="js/script.js"></script>
</body>
</html>