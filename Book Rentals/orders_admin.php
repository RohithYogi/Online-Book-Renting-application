<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
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
      <!-- Right Nav Section -->
        <ul class="right">
        <li><a href="about.php">About</a></li>
          <li><a href="products.php">Books</a></li>
          <li class="active"><a href="orders.php">All Orders</a></li>
          <?php

          if(isset($_SESSION['username'])){
            
            echo '<li><a href="add.php">Add Books</a></li>';
            echo '<li><a href="req_admin.php">Requested Books</a></li>';
            echo '<li><a href="donate_admin.php">Donated Books</a></li>';
            echo '<li><a href="view.php">View Books</a></li>';
            echo '<li><a href="users_info.php">View Users</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          if(isset($_GET['delete']) && !empty($_GET['delete'])) {
            $delete_id = (int)$_GET['delete'];
            $query=$mysqli->query("DELETE FROM orders WHERE id = '{$delete_id}'");
                $result = $mysqli->query("SELECT * FROM orders WHERE id = '{$delete_id}'");

            if($result){
              $newqty = $result->qty + 1;
              $mysqli->query("UPDATE books SET qty = ".$newqty." WHERE id = ".$product_id);
            
              }
              header("Location: orders.php");

          }
          ?>
        </ul>
      </section>
    </nav>




    <!-- <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>My COD Orders</h3>
        <hr>

       
    //       $user = $_SESSION["username"];
    //       $result = $mysqli->query("SELECT * from orders where email='".$user."'");
    //       if($result) {
    //         while($obj = $result->fetch_object()) {
    //           //echo '<div class="large-6">';
    //           echo '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
    //           echo '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
    //           echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
    //           // echo '<p><strong>Book title</strong>: '.$obj->product_name.'</p>';
    //           echo '<p><strong>Price Per Week</strong>: '.$obj->price.'</p>';
    //           echo '<p><strong>Duration</strong>: '.$obj->duration.'</p>';
    //           //echo '</div>';
    //           //echo '<div class="large-6">';
    //           //echo '<img src="images/products/sports_band.jpg">';
    //           //echo '</div>';
    //           echo '<p><hr></p>';

    //         }
    //       }
    //     ?>
    //   </div> -->
     <!-- </div> -->
    <div class="col-md-6">
		<table class="table table-bordered table-condensed">
			<thead>
        <th>Order ID</th>
        <th>Email of customer</th>

				<th>Date of Purchase</th>
				<th>Product Code</th>
			   <th>Book title</th>
			    <th>Price Per Week</th>
          <th>Duration(in weeks)</th>
          <th>Status</th>

				<th></th>
			</thead>
			<tbody>
      <?php $user = $_SESSION["username"];?>
				<?php $result = $mysqli->query("SELECT * from orders "); ?>
				<?php while($books_table = mysqli_fetch_assoc($result)) : ?>
				<tr class="bg-primary">
          <td><?php echo $books_table['id']; ?></td>
          <td><?php echo $books_table['email']; ?></td>

				    <td><?php echo $books_table['date']; ?></td>
					<td><?php echo $books_table['product_code']; ?></td>
				    <td><?php echo $books_table['product_name']; ?></td>
					<td><?php echo $books_table['price']; ?></td>
          <td><?php echo $books_table['duration']; ?></td>
          <td><?php echo $books_table['status']; ?></td>

				    <td>
						<a class ="button4" href="update_order.php?edit=<?php echo $books_table['id'];?>"><i class="fa fa-edit"></i>Update/</a>
                        <a class ="button4" href="orders_admin.php?delete=<?php echo $books_table['id']; ?>"><i class="fa fa-close"></i>Cancel</a>
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
