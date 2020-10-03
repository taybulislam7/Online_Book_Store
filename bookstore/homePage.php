<?php
include "config.php";
session_start();

if(!isset($_SESSION["username"])){
  header("Location: {$hostname}/admin/");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/plugins.min.css">

    <link rel="stylesheet" href="homeStyle.css">

</head>
<body>
<section class="home" style="background:url(c.jpg) #333 40% 40%;">
<div class="gradient-overlay1 opacity7"></div>


<div class="container">
  <div class="name-block">
      <div class="name-block-container">
          <h1><span>A</span>source of Light</h1>
          <h2>Illuminate your way towards the thirst of knowledge.</h2>
          <ul class="social">
            <li><a href=""><i class="ion-social-facebook"><img src="facebook.png" alt=""></i></a></li>
            <li><a href="taybulislam7@gamil.com"><i class="ion-social-Instragram"><img src="instragram.png" alt=""></i></a></li>
            <li><a href="taybulislam7@gmail.com"><i class="ion-social-googleplus"><img src="googleplus.png" alt=""></i></a></li>

          </ul>
      </div>
  </div>
  <div class="menu-blocks">
    <a href="index.php">
      <div class="about-block menu-block">
          <div class="about-block-container">
              <h2 class="about menu-item">Battalion of candels</h2>
          </div>
      </div>
    </a>

      <a href="admin/post.php">
      <div class="portfolio-block menu-block">
        <div class="portfolio-block-container">
            <h2 class="portfolio menu-item">Post</h2>
        </div>
    </div></a>
    <a href="http://localhost/bookstore/admin/add-post.php">
      <div class="blog-block menu-block">
          <div class="blog-block-container">
              <h2 class="blog menu-item">Add Post</h2>
          </div>
      </div>

    </a>
    <a href="http://localhost/bookstore/admin/logout.php">
    <div class="contact-block menu-block">
        <div class="contact-block-container">
            <h2 class="contact menu-item">Log out</h2>
        </div>
    </div></a>
  </div>
</div>

</section>


</body>
</html>
