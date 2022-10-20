<?php

    include 'config.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

     <!--Font Awesome Link-->
     <link rel="stylesheet" href="css/all.css.css">

    <!--Custom CSS Link-->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'header.php'; ?>
    

     <!--==================== About-Heading Section Start ====================-->
    <div class="heading">
        <h3>about us</h3>
        <p><a href="home.php">Home</a>  / about</p>
    </div>
     <!--==================== About-Heading Section End ====================-->


     <!--==================== About Section Start ====================-->
     <section class="about-home">
        <div class="flex">

            <div class="image">
                <img src="images/about.jpg" alt="">
            </div>

            <div class="content">
                <h3>Why choose us?</h3>
                <p>We offer a tremendous gathering of books in the various classifications of Fiction, Non-fiction, Biographies, History, Religions. We likewise move in immense accumulation of Investments and Management, Computers, Engineering, Medical, College and School content references books proposed by various foundations as schedule the nation over.</p>
                <p>We modestly welcome every one of the merchants around the nation to band together with us. We might want to thank you for shopping with us. You can keep in touch with us for any new musings of our products</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>

        </div>
    </section>
    <!--==================== About Section End ====================-->


    <!--==================== About-Review Section Start ====================-->
    <section class="about-review">

        <h1 class="title">Clients review</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/reviews (1).png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda suscipit blanditiis ipsum magnam numquam distinctio!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (2).png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda suscipit blanditiis ipsum magnam numquam distinctio!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (3).png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda suscipit blanditiis ipsum magnam numquam distinctio!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (4).png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda suscipit blanditiis ipsum magnam numquam distinctio!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (5).png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda suscipit blanditiis ipsum magnam numquam distinctio!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (1).png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda suscipit blanditiis ipsum magnam numquam distinctio!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>

        </div>

    </section>
    <!--==================== About-Review Section End ====================-->


    <!--==================== About-Authors Section Start ====================-->
    <section class="about-authors">

        <h1 class="title">Clients review</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/reviews (1).png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (2).png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (3).png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (4).png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (5).png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>
            <div class="box">
                <img src="images/reviews (1).png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Ibiloye Olusegun</h3>
            </div>

        </div>

    </section>
    <!--==================== About-Authors Section End ====================-->












    <?php include 'footer.php'; ?>

    <!-- Custom Admin JS File -->
    <script src="js/script.js"></script>
</body>
</html>