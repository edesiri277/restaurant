<?php
    session_start();
    include("connection.php");

    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }
 
    if(isset($_POST['add_to_cart'])){

      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_qty = $_POST['qty'];

      $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

      if(mysqli_num_rows($select_cart) > 0){
        // If product is already in the cart, show an alert
        echo "<script>alert('Product already added to cart'); window.history.back();</script>";
      }
      else{
        // If product is not in the cart, add it to the cart
        $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, qty) VALUES ('$product_name', '$product_price', '$product_image', '$product_qty')");
        if ($insert_product) {
            // If insertion is successful, show a success alert
            echo "<script>alert('Product added to cart successfully!');</script>";
        } else {
            // If insertion fails, show an error alert
            echo "<script>alert('Failed to add product to cart. Please try again.'); window.history.back();</script>";
        }
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Restaurant -Menu</title>

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
        background-image:linear-gradient(rgba(26, 24, 22, 0.85), rgba(26, 24, 22, 0.85)), url(Images/menu-background.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
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

             <!----------- Menu Start --------->
       
    <div class="menu-main">
     <div class="menu-banner">
        <h1>Our <span style="color:#d34675;">Menu</span></h1>
      </div>
      <div class="menu-title2">
        <p>Here is our menu where you can find all our available tasty delicacy <br>that will leave you wanting want.</p>
      </div>

      <section class="food-contain">

      
        <div class="pro-container">
          
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM products");
        if(mysqli_num_rows($select_products) > 0){
          while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>

        <form action="" method="post">
          <div class="food-box">
            <img src="Images/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="fles">
               <p class="price">Price &#8358;<?php echo $fetch_product['price']; ?></p>
               <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
            </div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="button" value="Add to cart" name="add_to_cart">
             
          </div>
        </form>

        <?php
          }
        }
        else{
          echo "<p class='empty'>no product added yet!</p>";
        }
        ?>

        </div>
      </section>

      </div>
   
          
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