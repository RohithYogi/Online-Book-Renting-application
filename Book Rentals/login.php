<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

        header("location:index.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login || Book Rental Service</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script type="js/vendor/login.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Book Rental Service</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Books</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li class="active"><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>



    <form method="POST" action="verify.php" style="margin-top:30px;">
    <div class="cont">
      <div class="form sign-in">
        <h2>Welcome back,</h2>
        <label>
          <label for="right-label" class="center inline">Email</label>
          <input type="email" id="right-label" placeholder="nayantronix@gmail.com" name="username">
        </label>
        <label>
           <label for="right-label" class="center inline">Password</label>
          <input type="password" id="right-label" name="pwd">
        </label>
        <p class="forgot-pass">Forgot password?</p>
        <button type="submit" class="submit">Login</button>
      </div>


      <div class="sub-cont">
        <div class="img">
          <div class="img__text m--up">
            <h1>Book Rental Service</h1>
            <p>Register and rent great books online!</p>
            <h1>|</h1>
            <h1>|</h1>
            <h2>Already a member?</h2>
            <p>If you already have an account Sign In here</p>
            <h1>|</h1>
            <h1>|</h1>
            <h2>New to our store?</h2>
            <p>Create an account</p>
            
          </div>
          
        </div>
      </div>
    </div>
    </form>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Book Rental Service. All Rights Reserved.</p>
        </footer>

      </div>
    </div>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
