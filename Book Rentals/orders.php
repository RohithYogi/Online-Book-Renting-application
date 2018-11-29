<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
if(  $_SESSION["type"]==="admin") {
  header("location:orders_admin.php");
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders || Book Rental Service</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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
      <ul class="right">
          <li><a href="about.php">About</a></li>
          <li ><a href="products.php">Books</a></li>
          <li><a href="contact.php">Contact</a></li>;

          
          <?php
          if(isset($_SESSION['username'])){
           if(($_SESSION['type'])==='admin'){
            echo '<li class="active"><a href="orders.php">All Orders</a></li>';
            echo '<li><a href="add.php">Add Books</a></li>';
            echo '<li><a href="req_admin.php">Requested Books</a></li>';
            echo '<li><a href="donate_admin.php">Donated Books</a></li>';
            echo '<li ><a href="view.php">View Books</a></li>';
            echo '<li><a href="users_info.php">View Users</a></li>';
           
          }
          else if(($_SESSION['type'])==='user'){
            echo '<li><a href="cart.php">Cart</a></li>';
            echo '<li  class="active"><a href="orders.php">My Orders</a></li>';
            echo '<li><a href="donate.php">Donate Book</a></li>';
              echo '<li><a href="request.php">Request Book</a></li>';
            echo '<li><a href="account.php">My Account</a></li>';

          }
          
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          if(isset($_GET['delete']) && !empty($_GET['delete'])) {
            $delete_id = (int)$_GET['delete'];
            $query=$mysqli->query("DELETE FROM orders WHERE id = '{$delete_id}'");
            if($query){
              $newqty = $obj->qty + 1;
              $mysqli->query("UPDATE books SET qty = ".$newqty." WHERE id = ".$product_id);
            
              }
              header("Location: orders.php");

          }
          
          ?>
        </ul>

      </section>
    </nav>




    <div class="col-md-6">
		<table class="table table-bordered table-condensed">
			<thead>
				<th>Order ID</th>
				<th>Date of Purchase</th>
				<th>Product Code</th>
			   <th>Book title</th>
			    <th>Price Per Week</th>
          <th>Duration</th>
          <th>Status</th>

				<th></th>
			</thead>
			<tbody>
      <?php $user = $_SESSION["username"];?>
				<?php $result = $mysqli->query("SELECT * from orders where email='".$user."'"); ?>
				<?php while($books_table = mysqli_fetch_assoc($result)) : ?>
				<tr class="bg-primary">
					<td><?php echo $books_table['id']; ?></td>
				    <td><?php echo $books_table['date']; ?></td>
					<td><?php echo $books_table['product_code']; ?></td>
				    <td><?php echo $books_table['product_name']; ?></td>
					<td><?php echo $books_table['price']; ?></td>
          <td><?php echo $books_table['duration']; ?></td>
          <td><?php echo $books_table['status']; ?></td>

				    <td>
						<a class ="button4" href="extend.php?edit=<?php echo $books_table['id'];?>"><i class="fa fa-edit"></i>Extend/</a>
                        <a class ="button4" href="orders.php?delete=<?php echo $books_table['id']; ?>"><i class="fa fa-close"></i>Cancel</a>
					</td>
					
				
				</tr>
					
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>	



    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
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
