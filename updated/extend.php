<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
    header("location:index.php");
}

if($_SESSION["type"]!="user") {
    header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || Book Rental Service</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Book Rentals Service</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
        <li><a href="about.php">About</a></li>
          <li class='active'><a href="products.php">Books</a></li>
          
          <?php
          if(isset($_SESSION['username'])){
           if(($_SESSION['type'])==='admin'){
            echo '<li><a href="orders.php">All Orders</a></li>';
            echo '<li><a href="add.php">Add Books</a></li>';
            echo '<li><a href="req_admin.php">Requested Books</a></li>';
            echo '<li><a href="donate_admin.php">Donated Books</a></li>';
            echo '<li ><a href="view.php">View Books</a></li>';
            echo '<li><a href="users_info.php">View Users</a></li>';
           
          }
          else if(($_SESSION['type'])==='user'){
            echo '<li><a href="cart.php">Cart</a></li>';
            echo '<li><a href="orders.php">My Orders</a></li>';
            echo '<li><a href="donate.php">Donate Book</a></li>';
              echo '<li><a href="request.php">Request Book</a></li>';
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="contact.php">Contact</a></li>';

          }
          
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

    <form method="POST" action="update_order_admin.php" style="margin-top:30px;">
    <?php
  
        $edit_id = (int)$_GET['edit'];
        $edit_result = $mysqli->query("SELECT * FROM orders WHERE id = '{$edit_id}'");
        $edit_field = mysqli_fetch_assoc($edit_result);
   
    ?>
       <div class="col-md-6">
		<table class="table table-bordered table-condensed">
			<thead>
				<th>Order ID</th>
				<th>Date of Purchase</th>
				<th>Product Code</th>
			   <th>Book title</th>
			    <th>Price Per Week</th>
          <th>Duration(in weeks)</th>
          <th>Status</th>

				<th></th>
			</thead>
			<tbody>
				<tr class="bg-primary">
					<td><input type="number" id="right-label"  name="id" value=<?php echo  $edit_field['id']?> readonly></td>
				    <td><?php echo $edit_field['date']; ?></td>
					<td><?php echo $edit_field['product_code']; ?></td>
				    <td><?php echo $edit_field['product_name']; ?></td>
					<td><?php echo $edit_field['price']; ?></td>
          <td><input type="number" id="right-label"  name="time" value=<?php echo  $edit_field['duration']?>></td>
          <td><textarea class="form-control" name="status" id="description" rows="4" readonly><?php echo  $edit_field['status']?></textarea>
</td>

				  
					
				
				</tr>
					
			</tbody>
		</table>
	</div>	
     
                     <div class="small-8 columns">
              <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
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
