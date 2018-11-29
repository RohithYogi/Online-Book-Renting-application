
<?php

include 'config.php';
$id=$_POST["id"];
$duration=$_POST["time"];
$status=$_POST["status"];



echo $id;

if($mysqli->query('UPDATE orders SET duration ="'. $duration .'",status="'.$status .'" WHERE id ='.$id)){
    echo 'Data updated';
    echo '<br/>';
    header ("location:orders.php");
    
}
else 
{
    echo 'Data not updated';
    
}
// header ("location:edit.php");


?>
