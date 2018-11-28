<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';


 


// header("location:cart.php");
?>

<!doctype html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Books </title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
      </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Book Rental Store</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li class='active'><a href="products.php">Books</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:20px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $search_book=$_POST["search"];
          $result = $mysqli->query("SELECT * FROM books where title LIKE '%$search_book%' ");
          $result1 = $mysqli->query("SELECT * FROM books where author LIKE '%$search_book%' ");

          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {
              echo '<div style="background-color:#CCDADA; margin-top:30px;" class="columns">';
              echo '<p ><h3 style="color: #000000;text-align:center;"><b>'.$obj->title.'</h3></b></p>';
              echo '<img src="images/products/'.$obj->image.'". width=250px height=250px align="left" hspace="20" />';
              echo '<p style="color: #000000;margin-top:10px;"> <strong>Author</strong>: '.$obj->author.'</p>';
              echo '<p style="color: #000000;margin-top:10px;"> <strong>Description</strong>: <br />'.$obj->description.'</p>';
              echo '<p style="color: #000000"><strong>Price</strong> : '.$obj->price.'</p>';
              echo '<p style="color: #000000"><strong>Available Units</strong> : '.$obj->qty.'</p>';
              echo '<p style="color: #000000"><strong>Category</strong> : '.$obj->category.'</p>';

              // <form>
              //    <input type="text" id="number" value="0"/>
              //    <input type="button" onclick="incrementValue()" value="Increment Value" />
              // </form>
               


               


              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
                
              }
              else {
                echo '<p style="color: #000000;"><pre>                                                      <b>OUT OF STOCK!</b> </pre></p>';
              }
              echo '<p> <br/><br/><br/></p>';
              echo '</div> ';

              $i++;
            }
        }
        if($result1){
            while($obj = $result1->fetch_object()) {
                echo '<div style="background-color:#CCDADA; margin-top:30px;" class="columns">';
                echo '<p ><h3 style="color: #000000;text-align:center;"><b>'.$obj->title.'</h3></b></p>';
                echo '<img src="images/products/'.$obj->image.'". width=250px height=250px align="left" hspace="20" />';
                echo '<p style="color: #000000;margin-top:10px;"> <strong>Author</strong>: '.$obj->author.'</p>';
                echo '<p style="color: #000000;margin-top:10px;"> <strong>Description</strong>: <br />'.$obj->description.'</p>';
                echo '<p style="color: #000000"><strong>Price</strong> : '.$obj->price.'</p>';
                echo '<p style="color: #000000"><strong>Available Units</strong> : '.$obj->qty.'</p>';
                echo '<p style="color: #000000"><strong>Category</strong> : '.$obj->category.'</p>';
  
                // <form>
                //    <input type="text" id="number" value="0"/>
                //    <input type="button" onclick="incrementValue()" value="Increment Value" />
                // </form>
                 
  
  
                 
  
  
                if($obj->qty > 0){
                  echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
                  
                }
                else {
                  echo '<p style="color: #000000;"><pre>                                                      <b>OUT OF STOCK!</b> </pre></p>';
                }
                echo '<p> <br/><br/><br/></p>';
                echo '</div> ';
  
                $i++;
              }
          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>

        <div class="row" style="margin-top:10px;">
          <div class="small-12">




        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;color: #000000">&copy; Book Rentals pvt ltd.</p>
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
