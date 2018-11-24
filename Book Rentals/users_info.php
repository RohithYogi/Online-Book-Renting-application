<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
    header("location:index.php");
}

if($_SESSION["type"]!="admin") {
    header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
<style> .button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
</style>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || Book Rental Service</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
            echo '<li ><a href="add.php">Add Books</a></li>';
            echo '<li><a href="view.php">View Books</a></li>';
            echo '<li class="active"><a href="users_info.php">View Users</a></li>';
            
            
            
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
          }
          //delete function(to remove books)
          if(isset($_GET['delete']) && !empty($_GET['delete'])) {
              $delete_id = (int)$_GET['delete'];
              $mysqli->query("DELETE FROM users WHERE id = '{$delete_id}'");
              header("Location: view.php");
          }
          ?>
        </ul>
      </section>
    </nav>

    <div class="col-md-6">
		<table class="table table-bordered table-condensed">
			<thead>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
			   <th>City</th>
			    <th>Pincode</th>
			    <th>Email</th>
				<th></th>
			</thead>
			<tbody>
				<?php $result = $mysqli->query("SELECT * FROM users where type!='admin' "); ?>
				<?php while($books_table = mysqli_fetch_assoc($result)) : ?>
				<tr class="bg-primary">
					<td><?php echo $books_table['fname']; ?></td>
				    <td><?php echo $books_table['lname']; ?></td>
					<td><?php echo $books_table['address']; ?></td>
				    <td><?php echo $books_table['city']; ?></td>
					<td><?php echo $books_table['pin']; ?></td>
					<td><?php echo $books_table['email']; ?></td>
				    <td>
                        <a class ="button4" href="view.php?delete=<?php echo $books_table['id']; ?>"><i class="fa fa-close"></i>Remove</a>
					</td>
					
				
				</tr>
					
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>	




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
