<?php
    session_start();

    include("connection.php");
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Restaurant -About</title>

        <!------------- Favicon Link ------------->
        <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon-32x32.png">
        <link rel="manifest" href="Images/favicon-32x32.png">
        
        <!-------------- AOS Link ---------------->
        <link href="aos-master/aos-master/dist/aos.css" rel="stylesheet">
        <script src="aos-master/aos-master/dist/aos.js"></script>

        <!-----------CSS LINK ------------->
        <link rel="stylesheet" href="style.css">

        <!--------- Font Awesome library link ----------->
        <script src="https://kit.fontawesome.com/a4250df899.js" crossorigin="anonymous"></script>

          <!----------- Bootstract icon link ---------->
        <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
 <style>
    body{
        background-image: linear-gradient(rgba(26, 24, 22, 0.85), rgba(26, 24, 22, 0.85)), url(Images/exclusive\ restaurant\ interior2.jpg);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    
    }
 </style>
</head>
<body>
  
      <!-- Preloader -->
      <div id="preloader"></div>

        <!------------ Header Start --------->
        <header class="header">

<div class="flex">
    <a href="#" class="logo">Exclusive Restaurant</a>

    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="menu.php">Menu</a>
        <a href="event.php">Event</a>
        <a href="chef.php">Chef</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a> 
    </nav>

    <div class="icons">
        <?php
             $select_rows = mysqli_query($conn, "SELECT * FROM cart") or die('query failed');
             $row_count = mysqli_num_rows($select_rows);
        ?>
        <a href="cart.php" class="cart-btn"><i class="bi bi-cart-fill"></i><sup><?php echo $row_count?></sup></a>
        <i id="user-btn" class="bi bi-person-fill"></i>
        <i id="menu-btn" class="bi bi-list"></i>
    </div>

    <div class="user-box">
      <p>Username: <span><?php echo $_SESSION['name'];?></span></p>
      <p>Email: <span><?php echo $_SESSION['email'];?></span></p>
      <a href="login.php" class="btn">Login</a>
      <a href="index.php" class="btn">Register</a>
      <a href="logout.php"> <button type="submit" name="logout" class="logout-btn">Log-out</button></a>
    </div>
  </div>
</header>
             <!------------ Header End ---------->
 
             <!------------ About Start --------->
             <section class="about">
                <div class="container">
          
                  <div class="content">
                    <h2><span style="font-size: 30px;">Who</span> are we <span style="color: #d87093;">____________</span></h2>
                    <h3 class="learn" style="font-size: 25px;">Learn <span style="color: #d34675; font-size: 40px;" >About us</span></h3>
                  </div>
          
                  <div class="flex">
                    <div class="writing">
                       <p>Exclusive restaurant is a world of culinary magic wherby our chefs create dishes that are not only top-notch but also visually stunning as well.</p>
                     <ul>
                       <li><i class="bi bi-check-all"></i> We have varieties of well made dishes and snack that will surely give you a taste you won't forget.</li>
                       <li data-aos="fade-up"><i class="bi bi-check-all"></i> Our restaurant is very exquisite which enables you to make mermories and have breath-taking pictures while doing that.</li>
                       <li data-aos="fade-up"><i class="bi bi-check-all"></i> Exclusive restaurant provides home service delivery so that you can also enjoy our amazing food from the comfort of your homes.</li>
                       <li data-aos="fade-up"><i class="bi bi-check-all"></i></i> Exclusive restaurant is located at Warri City, Delta state.</li>
                     </ul>
                       <p data-aos="fade-up">A fine-dining experience awaits you at Exclusive Restaurant. Life is dull without good food, come dine with us and always be pleased. We will always be at your service. Thank you.</p>
                    </div>

                      <div class="container" data-aos="zoom-in-up">
                        <img class="rrr" src="Images/exclusive restaurant interior.jpg" alt="" style="height: 460px;margin-top: 20px;">
                      </div>

                  </div>

                </div>
              </section>

          <section class="review" data-aos="fade-up">

            <div class="rev-pic" data-aos="fade-up">
              <h1>Customer's <span style="color: #d34675;">Review.</span></h1>
              <p>What our customers think of our restaurant.</p>
              <img src="Images/happy customers.jpg" alt="" class="he">
            </div>

              <div class="skill" data-aos="fade-up">
                <h1>Some of our <span style="color: #d34675;">customer's star rating.</span></h1>

                <li><h3>5 stars 
                  <span class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </span></h3>
                  <span class="bar"><span class="star5"></span></span>
                  <span class="texts">90%</span>
                </li>

                <li><h3>4 stars
                  <span class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                  </span></h3>
                  <span class="bar"><span class="star4"></span></span>
                  <span class="texts">85%</span>
                </li>

                <li><h3>3 stars
                  <span class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                  </span></h3>
                  <span class="bar"><span class="star3"></span></span>
                  <span class="texts">20%</span>
                </li>

                <li><h3>2 stars
                  <span class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                  </span></h3>
                  <span class="bar"><span class="star2"></span></span>
                  <span class="texts">5%</span>
                </li>
              </div>
            </section>
              <footer style="margin-top: 0;" data-aos="fade-up">

                <footer class="top-foot">
                <div>
                  <h1><i class="fa-solid fa-location-dot fa-lg" style="color: #9f4160;"></i> Locations </h1>
                  <ul>
                      <li><strong>Warri</strong> <br>Mosheshe Estate, <br> Airport road.</li>
                  </ul>
               </div>
      
               <div>
                <h1><i class="fa-solid fa-clock fa-lg" style="color: #9f4160;"></i> Opening Hours </h1>
                <ul>
                    <li><strong>Monday-Saturday;</strong> <br>9:00am-17:00pm</li>
                    <li><strong>Sunday;</strong> <br>11:00am-17:00pm</li>
                </ul>
               </div>
      
               <div>
                <h1><i class="fa-solid fa-mobile fa-lg" style="color: #9f4160;"></i> Contact Info</h1>
                <ul>
                    <li>+234 9043678295</li>
                    <li>+234 8136474847</li>
                    <li>exrestaurant@gmail.com</li>
                    <li>exrestaurant23@gmail.com</li>
                </ul>
               </div>
      
               <div>
                <h1><i class="fa-solid fa-user-plus fa-lg" style="color: #9f4160;"></i> Follow us </h1>
                <ul>
                  <li><a href=""><i class="bi bi-facebook"></i> Facebook</a></li>
                  <li><a href=""><i class="bi bi-twitter"></i> Twitter</a></li>
                  <li><a href=""><i class="bi bi-instagram"></i> Instagram</a></li>
                  <li><a href=""><i class="bi bi-linkedin"></i> Linkedin</a></li>
              </ul>
             </div>
      
               </footer>
      
               <div class="copyright" style="text-align: center;padding-top: 30px;padding-bottom: 30px;">
                &copy; Copyright <strong><span>Exclusive Restaurant</span></strong>. All Rights Reserved
                <p>Designed by Avwarute Edesiri</p>
              </div>
      
            </footer>

            <a href="#" class="scroll-top"><i class="bi bi-arrow-up-circle-fill"></i></i></a>

          <script>
           AOS.init();
          </script>

    <script src="main.js"></script>
</body>
</html>
