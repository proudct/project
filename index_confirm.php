<?php
session_start();

require 'connect.php';

if (!isset($_SESSION["Role"])) {
 $_SESSION["UserID"];
 $_SESSION["Role"];
 $_SESSION["name"] = $_POST["name"];
 $date = date("Y-m-d H:i:s");
 $_SESSION["lname"] = $_POST["lname"];
 $_SESSION["tel"] = $_POST["tel"];
 $_SESSION["email"] = $_POST["email"];
 $_SESSION["company"] = $_POST["company"];
 $_SESSION["address"] = $_POST["address"];
 $_SESSION["type"] = $_POST["type"];
 $_SESSION["brandname"] = $_POST["brandname"];
 $_SESSION["banner"] = $_POST["banner"];
 header("location:login_E.php");
                            } else if($_SESSION["Role"]=="exhibitor" ){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                              if($_SESSION["status"]!="y" ){
                                echo "กรุณารอการยืนยันจากผู้ดูแลระบบ ก่อนทำการจอง";
                              }
                              else{
                              $user_id = $_SESSION["UserID"];
                               $role =$_SESSION["Role"];
                               $name = $_POST["name"];
                               $date = date("Y-m-d H:i:s");
                               $lname = $_POST["lname"];
                               $tel = $_POST["tel"];
                               $email = $_POST["email"];
                               $company = $_POST["company"];
                               $address = $_POST["address"];
                               $type = $_POST["type"];
                               $brandname = $_POST["brandname"];
                               $banner = $_POST["banner"];


                               $Total = 0;
                               $SumTotal = 0;


                               $sql = "
                               INSERT INTO bookings (booking_date,user_id,role,name,lname,tel,email,company,address,type,brandname,banner)
                               VALUES
                               ('$date','$user_id','$role', '$name','$lname' ,'$tel','$email','$company','$address','$type','$brandname','$banner') ";
// echo  $sql;
                               $query = mysqli_query($con,$sql);
                                if(!$query)
                               {
                                echo $con->error;
                                exit();
                              }



                              $strBookingE_id = mysqli_insert_id($con);
                              echo "$strBookingE_id";

                              for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                              {
                                if($_SESSION["strBoothE_id"][$i] != "")
                                {
                                 $sql1 = "
                                 INSERT INTO booking_detail (booking_id,booth_id,qty)
                                 VALUES
                                 ('".$strBookingE_id."','".$_SESSION["strBoothE_id"][$i]."','".$_SESSION["strQtyE"][$i]."') 
                                 ";
                                 $query1 = mysqli_query($con,$sql1);


                                 if(!$query1)
                                 {
                                  echo "Error Save [".$sql1."]";
                                }

                                $b_sql = "
                                UPDATE booths SET 
                                status = '".$_POST["status"]."' 
                                WHERE booth_id = '".$_SESSION["strBoothE_id"][$i]."'";

                                $b_query = mysqli_query($con,$b_sql);
                                if(!$b_query)
                                {
                                  echo "Error Save [".$b_sql."]";
                                }
                              }
                            }

                            mysqli_close($con);

// session_destroy();

                            header("location:index_view_order.php?booking_id=".$strBookingE_id);
                                 echo "<a href='index_confirm.php' class='btn btn-success'>ยืนยันo</a>";

                          }
                        }


                        ?>

