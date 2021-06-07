<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Food order</title>
  </head>
  <body>
    <!-- Navbar Section -->
    <section class="navbar">
      <div class="container">
        <div class="logo">
          <img src="../img/logo.png" alt="Restaurant Logo" class="image" />
        </div>
        <div class="restaurant-name">FOOD ERA</div>
        <div class="menu text-right">
          <ul>
            <li><a href="<?php echo SITEURL; ?>html/index.php">Home</a></li>
            <li><a href="<?php echo SITEURL; ?>html/categories.php">Categories</a></li>
            <li><a href="<?php echo SITEURL; ?>html/foods.php">Foods</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>

        <div class="clearfix"></div>
      </div>
    </section>