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
    <title>Exclusive Restaurant -chef</title>

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
        <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.css">

           <!----------- Bootstract icon link ---------->
        <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">

     <style>
        body{
            background-color: black;
        } 
    </style>

</head>
<body>
  
        <!-- Preloader -->
        <div id="preloader"></div>

         <!------------ Header Start -------->
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
                 <!-----------Header End --------->
    
       <section class="chef">
        <div class="chef-head" style="padding-top: 48px;">
            <h1>Our <span style="color: #d94675;">Adept Chefs</span></h1>
        </div>

        <div class="chef-body">
            <p>Here are some of our chefs who has acquired years of great culinary skills, <br> which are capable of feeding you and leaving you wanting more. </p>
        </div>

        <div class="cont-chef-img">
                <div>
                  <div class="member">
                    <img src="Images/executive chef.jpg" alt="" data-aos="fade-up" class="even">
                    <div class="member-info">
                      <div class="member-info-content">
                        <h4 data-aos="fade-right">Christopher Myers</h4>
                        <span data-aos="fade-right">Executive Chef</span>
                      </div>
                      <div class="social" data-aos="fade-right">
                        <a href=""><i class="fa-brands fa-square-twitter" style="color: #d94675;"></i></a>
                        <a href=""><i class="fa-brands fa-square-facebook" style="color: #d94675;"></i></a>
                        <a href=""><i class="fa-brands fa-square-instagram" style="color: #d94675;"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin" style="color: #d94675;"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div>
                    <div class="member">
                      <img src="Images/sous chef.jpg" alt="" data-aos="fade-up" class="even">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4 data-aos="fade-right">Favour Adamodu</h4>
                          <span data-aos="fade-right">Sous Chef</span>
                        </div>
                        <div class="social" data-aos="fade-right">
                          <a href=""><i class="fa-brands fa-square-twitter" style="color: #d94675;"></i></a>
                          <a href=""><i class="fa-brands fa-square-facebook" style="color: #d94675;"></i></a>
                          <a href=""><i class="fa-brands fa-square-instagram" style="color: #d94675;"></i></a>
                          <a href=""><i class="fa-brands fa-linkedin" style="color: #d94675;"></i></a>
                        </div>
                      </div>
                    </div>
                </div>

                  <div>
                    <div class="member">
                      <img src="Images/pastry chef.jpg" alt="" data-aos="fade-up" class="even">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4 data-aos="fade-right">Tony Omoruji</h4>
                          <span data-aos="fade-right">Head Pastry Chef</span>
                        </div>
                        <div class="social" data-aos="fade-right">
                          <a href=""><i class="fa-brands fa-square-twitter" style="color: #d94675;"></i></a>
                        <a href=""><i class="fa-brands fa-square-facebook" style="color: #d94675;"></i></a>
                        <a href=""><i class="fa-brands fa-square-instagram" style="color: #d94675;"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin" style="color: #d94675;"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>

        <div class="cont-chef-img2">
            <div>
                <div class="member">
                  <img src="Images/line chef.jpg" alt="" data-aos="fade-up" class="even">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4 data-aos="fade-right">Amanda Okewe</h4>
                      <span data-aos="fade-right">Line Chef</span>
                    </div>
                    <div class="social" data-aos="fade-right">
                      <a href=""><i class="fa-brands fa-square-twitter" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-square-facebook" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-square-instagram" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-linkedin" style="color: #d94675;"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <div class="member">
                  <img src="Images/pantry chef.jpg" alt="" data-aos="fade-up" class="even">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4 data-aos="fade-right">John James</h4>
                      <span data-aos="fade-right">Pantry Chef</span>
                    </div>
                    <div class="social" data-aos="fade-right">
                      <a href=""><i class="fa-brands fa-square-twitter" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-square-facebook" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-square-instagram" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-linkedin" style="color: #d94675;"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <div class="member">
                  <img src="Images/fry chef.jpg" alt="" data-aos="fade-up" class="even">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4 data-aos="fade-right">Rose Peterson</h4>
                      <span data-aos="fade-right">Fry Chef</span>
                    </div>
                    <div class="social" data-aos="fade-right">
                      <a href=""><i class="fa-brands fa-square-twitter" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-square-facebook" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-square-instagram" style="color: #d94675;"></i></a>
                      <a href=""><i class="fa-brands fa-linkedin" style="color: #d94675;"></i></a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
       </section>    
       
       <footer data-aos="fade-up">

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

    <script>
      AOS.init();
     </script>

    <script src="main.js"></script>
</body>
</html>