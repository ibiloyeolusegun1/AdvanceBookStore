<?php

    include 'config.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }


    if(isset($_POST['order_btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = $_POST['number'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['state'].', '. $_POST['country'].' - '. $_POST['pin_code']);
        $placed_on = date('d-M-Y');

        $cart_total = 0;
        $cart_products[] = '';

        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_query) > 0){
            while($cart_item = mysqli_fetch_assoc($cart_query)){
                $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total += $sub_total;
            }
        }

        $total_products = implode(', ', $cart_products);

        $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

        if($cart_total == 0){
            $message[] = 'your cart is empty';
        }else{
            if(mysqli_num_rows($order_query) > 0){
                $message[] = 'order already placed!';
            }else{
                mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die();
                $message[] = 'order placed successfully!';

                mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

     <!--Font Awesome Link-->
     <link rel="stylesheet" href="css/all.css.css">

    <!--Custom CSS Link-->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'header.php'; ?>
    


    <!--==================== Checkout Section Start ====================-->
    <div class="heading">
        <h3>Checkout</h3>
        <p><a href="home.php">Home</a>  / Checkout</p>
    </div>
    <!--==================== Checkout Section End ====================-->


    <!--==================== Display Order Section Start ====================-->
    <section class="display-order">

        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
        ?>
        <p><?php echo $fetch_cart['name']; ?> <span>(<?php echo '&#8358;'.$fetch_cart['price'] .' x '. $fetch_cart['quantity']; ?>)</span></p>
        <?php
                }
            }else{
                echo '<p class="empty">Your cart is empty!</p>';
            }
        ?>
        <div class="grand-total">Grand total : <span>&#8358;<?php echo $grand_total; ?></span></div>

    </section>
    <!--==================== Display Order Section End ====================-->



    <!--==================== Checkout Section Start ====================-->
    <section class="checkout">
        <form action="" method="post">
            <h3>place your order</h3>
            <div class="flex">

                <div class="inputBox">
                    <span>your name</span>
                    <input type="text" name="name" placeholder="enter your name" required>
                </div>
                <div class="inputBox">
                    <span>your number</span>
                    <input type="number" name="number" placeholder="enter your number" required>
                </div>
                <div class="inputBox">
                    <span>your email</span>
                    <input type="email" name="email" placeholder="enter your email" required>
                </div>
                <div class="inputBox">
                    <span>payment method</span>
                    <select name="method">
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="credit card">credit card</option>
                        <option value="paypal">paypal</option>
                        <option value="bitcoin">bitcoin</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>address line 1</span>
                    <input type="number" min="0" name="flat" placeholder="e.g flat no." required>
                </div>
                <div class="inputBox">
                    <span>address line 2</span>
                    <input type="text" name="street" placeholder="e.g street name" required>
                </div>
                <div class="inputBox">
                    <span>city</span>
                    <input type="text" name="city" placeholder="e.g lokoja" required>
                </div>
                <div class="inputBox">
                    <span>state</span>
                    <input type="text" name="state" placeholder="e.g kogi" required>
                </div>
                <div class="inputBox">
                    <span>country</span>
                    <input type="text" name="country" placeholder="e.g nigeria" required>
                </div>
                <div class="inputBox">
                    <span>pin code</span>
                    <input type="number" min="0" name="pin_code" placeholder="e.g 123456" required>
                </div>
    
            </div>
            <input type="submit" value="order now" class="btn" name="order_btn">
        </form>
    </section>
    <!--==================== Checkout Section End ====================-->














    <?php include 'footer.php'; ?>

    <!-- Custom Admin JS File -->
    <script src="js/script.js"></script>
</body>
</html>