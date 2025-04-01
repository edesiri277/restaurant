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
    <title>Exclusive Restaurant -contact</title>

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

               

        <section class="contact">

                <h2 style="text-align: center;font-size: 33px;padding-top: 74px;color:  #d34675; margin-top: 3.5rem;">Contact Us</h2>
                <h4 style="text-align: center;font-size: 23px;color: white;">How may we help you ?</h4>

          <div class="flex-cont" style="display: flex;flex-wrap: wrap;padding-top: 25px;margin-left: 20px; ">

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15884.339667004962!2d5.7931839!3d5.5544299!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1041adbf5bb9fc75%3A0xfd40d95be656003c!2sMosheshe%20estate!5e0!3m2!1sen!2sng!4v1718170263520!5m2!1sen!2sng" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div class="contact-body">
            <?php
          if(isset($_POST['send'])){
            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userSubject = $_POST['userSubject'];
            $userMessage = $_POST['userMessage'];
            $toEmail = 'edesiriavwarute@gmail.com';

            $mailHeaders = "Name: " .$userName . 
            "r/n Email: " . $userEmail . 
            "r/n Subject: " . $userSubject . 
            "r/n Message: " . $userMessage . "r/n";

            if(mail($toEmail, $userName, $mailHeaders)){
              echo "<script>alert('Your message has been sent successfully.'); window.history.back();</script>";
                    exit();
              // $messsage = "Your information is received successfully.";
            }
          }
         
         ?>
                
                <form action="" method="POST" name="emailContact">
                    <div class="inputBox" data-aos="fade-up">
                        <div class="input">
                          <span>Your Name</span>
                          <input type="text" placeholder="enter your name" name="userName">
                        </div>
            
                        <div class="input" data-aos="fade-up">
                          <span>Your Email Address</span>
                          <input type="email" placeholder="enter your email" name="userEmail">
                        </div>
             
                    </div>

                    <div class="inputBox" data-aos="fade-up">
                      <div class="input">
                        <span>Subject</span>
                        <input type="text" placeholder="reason for message" name="userSubject">
                      </div>

                    </div>

                    <div class="inputBox" data-aos="fade-up">
                      <div class="input">
                        <span>Your Message</span>
                        <textarea id="message" rows="5" placeholder="Message" name="userMessage"></textarea>
                      </div>
                    </div>
                    
                    <input type="submit" name="send" value="Send Message" class="contact-table" data-aos="fade-up">
                </form>
            </div>

          </div>
        </section> 
        
        <footer style="margin-top: 50px;" data-aos="fade-up">

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
