<?php
 session_start();
 include("connection.php");

 if(!isset($_SESSION['email'])){
     header("Location: login.php");
 }

 if(isset($_POST['update_cart'])){
    $update_value = $_POST['update_qty'];
    $update_id = $_POST['update_qty_id'];
    $update_qty_query = mysqli_query($conn, "UPDATE cart SET qty = '$update_value' WHERE id = '$update_id'");
    if($update_qty_query){
        $message = 'Cart updated successfully!';
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
 }

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'");
    header('Location:cart.php');
}

if(isset($_GET['delete_all'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart");
    header('Location:menu.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Restaurant -Shopping cart</title>

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
        background-image:linear-gradient(rgba(26, 24, 22, 0.85), rgba(26, 24, 22, 0.85)), url(Images/Food1.jpg);
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
    <div class="menu-main">
      <div class="menu-banner">
        <h1 style="color:white;">Your <span style="color:#d34675;">Cart</span></h1>
      </div>

      <section class="food-contain">
        <div class="pro-container">
          
        <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM cart");
        if(mysqli_num_rows($select_cart) > 0){
          while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        ?>

        <form action="" method="post">
          <div class="food-box">
            <input type="hidden" name="id" value="<?=$fetch_cart['id']; ?>">
            <img src="Images/<?php echo $fetch_cart['image']; ?>" alt="">
            <h3><?php echo $fetch_cart['name']; ?></h3>
            <div class="fles">
               <p class="price">Price &#8358;<?php echo $fetch_cart['price']; ?></p>
               <form action="" method="post">
                <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['id']; ?>">
                <input type="number" name="update_qty" required min="1" value="<?php echo $fetch_cart['qty']; ?>" class="qty"> 
                 <button type="submit" name="update_cart" class="fa-regular fa-pen-to-square"></button>
               </form>
            </div>
            <p class="sub-total">Sub Total : <span>&#8358;<?=$sub_total = ($fetch_cart['qty']* $fetch_cart['price']) ?></span></p>
            <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Delete this item')" class="button">Remove</a>
             
          </div>
        </form>

        <?php
           $grand_total+=$sub_total;
          }
        }
        else{
          echo "<p class='empty'>No product added yet!</p>";
        }
        ?>

        <?php
           if($grand_total !=0){
        ?>
        <div class="cart-total">
            <p>total amount payable : <span>&#8358; <?= $grand_total; ?></span></p>
            <div class="cart-flex">
                <form action="" method="post" style="margin-top:10px";>
                <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to empty cart')" class="delete-btn">Delete all</a>
                </form>
                <a href="checkout.php" class="checkout-btn" <?= ($grand_total > 1) ?>>Proceed to checkout</a>
            </div>
        </div>
        <?php } ?>
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