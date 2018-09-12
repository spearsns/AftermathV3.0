<?php 
   
   $conn = mysqli_connect("127.0.0.1:3307", 'root', '', "aftermath");
   if(! $conn )
   {
     die('Could not connect: ' . mysql_error());
   }

?>