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
    <title>Exclusive Restaurant -events</title>

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
             <!-----------Header End --------->
             
             <section class="events">
              
              <div class="heading">
                  <h1>Events</h1>
                  <h2>Come have new experinces with us</h2>
              </div>
      
              <div class="body">
                  <p>Exclusive Restaurant provides you with the best exquisite environment for you to create, share and experience life time beautiful memories with your partners, friends, family and even your business associate.</p>
                  <p style="padding-top: 10px;">We organize different types of events to make your stay interersting such as inviting local musicians and comedians to come perform, we also give room for open mic to any of the guests,our chefs show case their cooking skills occasionally and the must interersting part is that Exclusive Restaurant also got you covered when it comes to also organizing your personal events such as birthday dinner party, anniverasy dates, friends or family get together.</p>
              </div>
      
              <div class="pic1">

                <div class="main-container" data-aos="fade-up">
                   <img src="Images/instrumentalist.jpg" alt="" style="width: 350px;margin-top: 10px;" class="eve">
                     <div class="event-info-content">
                      <h4 data-aos="fade-right">Our instrumentalist</h4>
                     </div>
                  <div class="overlay">
                    <h1>Our instrumentalist playing for <br> our customers.</h1>
                  </div>
                </div>

                <div class="main-container" data-aos="fade-up">
                   <img src="Images/Three Microphones At Bar Nighttime.jpg" alt="" style="width: 350px;margin-top: 10px;" class="eve">
                   <div class="event-info-content">
                    <h4 data-aos="fade-right">Our open-mic session</h4>
                   </div>
                  <div class="overlay">
                    <h1>We give room for our customers <br> to perform for us occasionally.</h1>
                  </div>
                </div>  

                <div class="main-container" data-aos="fade-up">
                   <img src="Images/Flaming Culinary Performance.jpg" alt="" style="width: 350px;margin-top: 10px;" class="eve">
                   <div class="event-info-content">
                    <h4 data-aos="fade-right">Showmanship.</h4>
                   </div>
                  <div class="overlay">
                    <h1>Our amazing chefs engaging our customers with live cooking <br> experience.</h1>
                  </div>
                </div>

              </div>
      
              <div class="pic2">

                <div class="main-container" data-aos="fade-up">
                   <img src="Images/birthday party.jpg" alt="" style="width: 350px;margin-top: 10px;" class="eve">
                   <div class="event-info-content">
                    <h4 data-aos="fade-right">Celebration of birthday</h4>
                   </div>
                  <div class="overlay">
                    <h1>We can organize birthday parties <br> and other occasions in our <br> restaurant.</h1>
                  </div>
                </div>

                <div class="main-container" data-aos="fade-up">
                   <img src="Images/couple dinner.jpg" alt="" style="width: 350px;margin-top: 10px;" class="eve">
                   <div class="event-info-content">
                    <h4 data-aos="fade-right">Couples date</h4>
                   </div>
                  <div class="overlay">
                    <h1>We provide the best atmosphere <br> for a romantic date for your <br> partners.</h1>
                  </div>
                </div>

                <div class="main-container" data-aos="fade-up">
                   <img src="Images/girl's day.jpg" alt="" style="width: 350px;margin-top: 10px;" class="eve">
                   <div class="event-info-content">
                    <h4 data-aos="fade-right">Girls outing</h4>
                   </div>
                  <div class="overlay">
                    <h1>Have a great time with friens at <br> our restaurant.</h1>
                  </div>
                </div>

              </div>
      
              

              <section class="make-reserve" data-aos="fade-up" id="table-header">
              <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $number = $_POST['number'];
                $date_time = $_POST['date_time'];
                $email = $_POST['email'];
                $no_people = $_POST['no_people'];
                $occasion = $_POST['occasion'];
                $message = $_POST['message'];

                $entry = mysqli_query($conn, "INSERT INTO `book_table` (name,number,date_time,email,no_people,occasion,message) VALUES('$name', '$number', '$date_time', '$email','$no_people','$occasion','$message')");

                if ($entry) {
                  echo "<script type='text/javascript'>alert('Message sent successfully!');</script>";
                } else {
                  $error_message = mysqli_error($conn);
                  echo "<script type='text/javascript'>alert('Message was unsuccessful! Error: $error_message');</script>";
                }
              }
              
              ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
                <form action="" method="post">
                     <h3 class="table-header" data-aos="fade-up">Book a Table</h3>

                   <div class="inputBox" data-aos="fade-up">
                      <div class="input">
                        <span>Your Name</span>
                        <input type="text" placeholder="enter your name" name="name">
                    </div>
          
                      <div class="input" data-aos="fade-up">
                        <span>Your Number</span>
                        <input type="number" placeholder="enter your number" name="number">
                      </div>
          
                    </div>
          
                    <div class="inputBox" data-aos="fade-up">
                      <div class="input">
                          <span>Date and Time</span>
                          <input type="datetime-local" name="date_time">
                      </div>
      
                      <div class="input" data-aos="fade-up">
                        <span>Your Email</span>
                        <input type="email" placeholder="enter your email" name="email">
                      </div>
          
                    </div>
      
                    <div class="inputBox" data-aos="fade-up">
                      <div class="input">
                          <span>Number of People</span>
                          <input type="number" placeholder="enter no. of people" name="no_people">
                      </div>
      
                      <div class="input" data-aos="fade-up">
                        <span>Kind of Occasion</span>
                        <input type="text" placeholder="enter occasion" name="occasion">
                      </div>
          
                    </div>
      
                    <div class="inputBox" data-aos="fade-up">
                      <div class="input" id="mess">
                        <span>Your Message</span>
                        <textarea name="message" placeholder= "enter your message" id="" cols="30" rows="10"></textarea>
                      </div>
                    </div>
      
                    <input type="submit" name="submit" value="Make Reservation" class="btn-table" data-aos="fade-up">
                </form>
              </section>
      
      
      
      
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

        <a href="#" class="scroll-top"><i class="bi bi-arrow-up-circle-fill"></i></i></a>

        <script>
          AOS.init();
         </script>

        <script src="main.js"></script>
</body>  
</html>