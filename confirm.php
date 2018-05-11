<?php
session_start();

require 'connect.php';


  $Total = 0;
  $SumTotal = 0;
      

  $sql = "
  INSERT INTO bookings (booking_date,user_id,role,name,lname,tel,email,type,brandname,banner)
  VALUES
  ('".date("Y-m-d H:i:s")."','".$_SESSION["UserID"]."','".$_SESSION["Role"]."','".$_POST["name"]."','".$_POST["lname"]."' ,'".$_POST["tel"]."','".$_POST["email"]."','".$_POST["type"]."','".$_POST["brandname"]."','".$_POST["banner"]."') ";
  echo "$sql";
$query = mysqli_query($con,$sql);
  if(!$query)
  {
  echo $con->error;
  exit();
  }



  $strBooking_id = mysqli_insert_id($con);
  echo "$strBooking_id";

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
    if($_SESSION["strBooth_id"][$i] != "")
    {
         $sql1 = "
        INSERT INTO booking_detail (booking_id,booth_id,qty)
        VALUES
        ('".$strBooking_id."','".$_SESSION["strBooth_id"][$i]."','".$_SESSION["strQty"][$i]."') 
        ";
        $query1 = mysqli_query($con,$sql1);


            if(!$query1)
            {
                echo "Error Save [".$sql1."]";
            }

         $b_sql = "
        UPDATE booths SET 
         status = '".$_POST["status"]."' 
         WHERE booth_id = '".$_SESSION["strBooth_id"][$i]."'";

            $b_query = mysqli_query($con,$b_sql);
                        if(!$b_query)
            {
                echo "Error Save [".$b_sql."]";
            }
    }
  }

mysqli_close($con);

// session_destroy();

header("location:view_order.php?booking_id=".$strBooking_id);
?>

<?php ?>