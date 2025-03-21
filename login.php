<?php
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Restaurant- login now</title>

    <!------------- Favicon Link ------------->
    <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon-32x32.png">
    <link rel="manifest" href="Images/favicon-32x32.png">

     <!-----------CSS LINK ------------->
     <link rel="stylesheet" href="style.css">

      <!----------- Bootstract icon link ---------->
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">

        <!--------- Font Awesome library link ----------->
        <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.css">

        <style>   
      body{
        background-image:linear-gradient(rgba(26, 24, 22, 0.85), rgba(26, 24, 22, 0.85)), url(Images/menu-background.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
      }
    </style>

</head>
<body>

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
            <a href="login.php" class="btn">Login</a>
            <a href="index.php" class="btn">Register</a>
            <a href="logout.php"> <button type="submit" name="logout" class="logout-btn">Log-out</button></a>
          </div>
        </div>
  </header>
             <!-----------Header End --------->

    <div class="regs-container">
        <section class="reg-container">

        <?php
               include("connection.php");
               if(isset($_POST['submit'])){
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);

                $result = mysqli_query($conn, "SELECT * FROM users WHERE name = '$name' AND email= '$email'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['id'] = $row['id'];
                }
                else{
                    echo "<script>alert('Invalid email'); window.history.back();</script>";
                    exit();
                }

                echo "<script>alert('Login successful!'); window.location.href = 'home.php';</script>";
                
                if(isset($_SESSION['email'])){
                     header("Location:home.php");
                }

               }else{
            
            ?>
            <div class="headings">
                <h1>Login Now</h1>
            </div>

            <form action="" method="post">
                <div class="input-field">
                    <p>Your username</p>
                    <input type="name" name="name" required placeholder="enter your name" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <div class="input-field">
                    <p>Your email</p>
                    <input type="email" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <input type="submit" name="submit" value="Login Now" class="btn">
                <p>don't have an account? <a href="index.php">Register Now</a></p>
            </form>
        </section>
    </div>


    
        <footer data-aos="fade-up">

    <footer class="top-foot" >
    <div >
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

    <?php } ?>
<script src="main.js"></script>
</body>
</html>