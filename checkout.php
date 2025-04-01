
<?php
    session_start();
    include("connection.php");

    if(isset($_POST['order_btn'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $method = $_POST['method'];
        $flat = $_POST['flat'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pin_code = $_POST['pin_code'];


        $cart_query = mysqli_query($conn, "SELECT * FROM cart");
        $total_price = 0;
        $product_name = array();

        if($cart_query){
            while($product_item = mysqli_fetch_assoc($cart_query)){
                $product_name[] = $product_item['name'] .' ('. $product_item['qty'] . ' )';
                // $product_price = $product_item['price'] * $product_item['qty'];
                // $total_price += $product_price;
                $total_price += $product_item['price'] * $product_item['qty'];
            }
        }
        else {
            die("Error fetching cart: " . mysqli_error($conn));
        }
        
        $total_products = implode(', ', $product_name);

        // Debugging line to check the value of $total_products
        // echo "<p>Total Products: " . htmlspecialchars($total_products) . "</p>";


        $detail_query = mysqli_query($conn, "INSERT INTO `order` (name,number,email,method,flat,street,city,state,country,pin_code,total_products,total_price) VALUE('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_products','$total_price')");

        if ($detail_query) {
            // Query to delete cart item
            $delete_cart_query = mysqli_query($conn, "DELETE FROM cart");
        } 

        if($cart_query && $detail_query){
            echo " 
             <div class='order-message-container'>
              <div class='message-container'>
              <h3>Thank you for dinning with us!</h3>
               <div class='order-detail'>
                <span class='total'>Total : &#8358;". htmlspecialchars(number_format($total_price, 2)) ."</span>
               </div>
             <div class='customer-details'>
              <p>Your name : <span>". htmlspecialchars($name) ."</span></p>
              <p>Your number : <span>". htmlspecialchars($number) ."</span></p>
              <p>Your email : <span>". htmlspecialchars($email) . "</span></p>
              <p>Your address : <span>". htmlspecialchars($flat) . ", " . htmlspecialchars($street) . ", " . htmlspecialchars($city) . ", " . htmlspecialchars($state) . ", " . htmlspecialchars($country) . " - " . htmlspecialchars($pin_code) ."</span></p>
              <p>Your payment method : <span>". htmlspecialchars($method) ."</span></p>
              <p>Total Food Ordered: <span>" . htmlspecialchars($total_products) . "<br>". "</span></p>
              <p>(*pay when food arrives*)</p>
            </div>
            <div class='cut'>
              <a href='menu.php' class='pbtn'>continue shopping</a>
              <a href='generate_pdf.php?name=" . urlencode($name) . "&number=" . urlencode($number) . "&email=" . urlencode($email) . "&method=" . urlencode($method) . "&flat=" . urlencode($flat) . "&street=" . urlencode($street) . "&city=" . urlencode($city) . "&state=" . urlencode($state) . "&country=" . urlencode($country) . "&pin_code=" . urlencode($pin_code) . "&total_products=" . urlencode($total_products) . "&total_price=" . urlencode(number_format($total_price, 2)) . "' class='download-btn'>Download Receipt</a>
              <a href='logout.php' class='logout-btn'>Log Out</a>
              </div>
           </div>
           </div>
          
            ";
        }
        
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Restaurant -Checkout</title>
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
        background-image:linear-gradient(rgba(26, 24, 22, 0.85), rgba(26, 24, 22, 0.85)), url(Images/menu-background.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
      }
    </style>
</head>
<body>
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
      <div class="check-container">

        <section class="checkout-form">
          <h2>Complete your order</h2>

            <form action="" method="post">

            <div class="display-order">
            <?php
              $select_cart = mysqli_query($conn, "SELECT * FROM cart");
              $grand_total = 0;
              if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = $fetch_cart['price'] * $fetch_cart['qty'];
                    $grand_total += $total_price;
            
            ?>
           
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['qty']; ?>)</span>

            <?php
                }
            }
            else{
                    echo "<div class='display-order'><span>your cart is empty!</span></div>";
                } 
            ?>
            <span class="grand-total">Grand Total : &#8358;<?= $grand_total; ?></span>
            </div>
            
               <h1>Fill in your information.</h1>
              <div class="check-flex">
                <div class="check-inputBox">
                    <span>Your Name</span>
                    <input type="text" placeholder="enter your name" name="name" required>
                </div>
                <div class="check-inputBox">
                    <span>Your Number</span>
                    <input type="number" placeholder="enter your number" name="number" required>
                </div>
                <div class="check-inputBox">
                    <span>Your Email</span>
                    <input type="email" placeholder="enter your email" name="email" required>
                </div>
                <div class="check-inputBox">
                    <span>Payment Method</span>
                    <select name="method">
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="credit card">credit card</option>
                        <option value="paypal">paypal</option>
                    </select>
                </div>
                <div class="check-inputBox">
                    <span>Address Line 1</span>
                    <input type="text" placeholder="e.g. flat no." name="flat" required>
                </div>
                <div class="check-inputBox">
                    <span>Address Line 2</span>
                    <input type="text" placeholder="e.g. street name" name="street" required>
                </div>
                <div class="check-inputBox">
                    <span>City</span>
                    <input type="text" placeholder="e.g. warri" name="city" required>
                </div>
                <div class="check-inputBox">
                    <span>State</span>
                    <input type="text" placeholder="e.g. delta" name="state" required>
                </div>
                <div class="check-inputBox">
                    <span>Country</span>
                    <input type="text" placeholder="e.g. nigeria" name="country" required>
                </div>
                <div class="check-inputBox">
                    <span>Pin Code</span>
                    <input type="text" placeholder="e.g. 123456" name="pin_code" required>
                </div>
                <input type="submit" value="Order Now" name="order_btn" class="order-btn">
              </div>  
            </form>
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

     <script>
      AOS.init();
     </script>

    <script src="main.js"></script>
</body>
</html>
