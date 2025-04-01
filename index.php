<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Restaurant- register now</title>

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
        <script src="https://kit.fontawesome.com/a4250df899.js" crossorigin="anonymous"></script>

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

          <?php
             $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
             $row_count = mysqli_num_rows($select_rows);
          ?>
          <div class="icons">
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
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                // verifying if email is unqiue

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $hashed_cpassword = password_hash($cpassword, PASSWORD_DEFAULT);

                $verify_query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password = '$password'");

                if(mysqli_num_rows($verify_query) !=0){
                    echo "<script>alert('This email is already used, try another one please!'); window.history.back();</script>";      
                }
                elseif($password != $cpassword){
                    echo "<script>alert('This password does not match, please check and try again!'); window.history.back();</script>"; 
                    }
                else{
                    mysqli_query($conn, "INSERT INTO users(name,email,password,cpassword) VALUES('$name', '$email', '$hashed_password', '$hashed_cpassword')") or die("error occured");

                    echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
                }
            }else{

           ?>     
            <div class="headings">
                <h1>Register Now</h1>
            </div>

            <form action="" method="post">
                <div class="input-field">
                    <p>Your name</p>
                    <input type="text" name="name" required placeholder="enter your name" maxlength="50">
                </div>
                <div class="input-field">
                    <p>Your email</p>
                    <input type="email" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <div class="input-field">
                    <p>Your password</p>
                    <input type="password" name="password" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <div class="input-field">
                    <p>Confirm password</p>
                    <input type="password" name="cpassword" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <input type="submit" name="submit" value="Register Now" class="btn">
                <p>already have an account? <a href="login.php">Login</a></p>
            </form>
        </section>
    </div>
    <?php } ?>


        <footer data-aos="fade-up">

    <footer class="top-foot" >
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

    
<script src="main.js"></script>
</body>
</html>
