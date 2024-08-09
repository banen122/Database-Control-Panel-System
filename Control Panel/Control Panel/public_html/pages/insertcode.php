<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'mobileintelligent');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];//phone number
    $password = $_POST['password'];
    $farmname = $_POST['farmname'];
    $location = $_POST['location'];
    $space = $_POST['space'];
    $cropname = $_POST['cropname'];
    $type = $_POST['type'];
    $state = $_POST['state'];

    $query = "INSERT INTO farmer VALUES('','$fname','$lname','$password')";
    $query_run = mysqli_query($connection, $query);
    

            if($query_run)
            {
            
            $sql = "select id_farmer from farmer where farmer_name ='$fname'";
            $sqlres = mysqli_query($connection,$sql);


            if(!$sqlres){
                echo "error";
            }


            else{


            while ($row = mysqli_fetch_array($sqlres)) {
                $id_farmer = $row['id_farmer'];
            }

            $query2="INSERT INTO farm VALUES ('','$id_farmer','$farmname','$location','$space')";
            $query_run2 = mysqli_query($connection, $query2);
            if($query_run2)
            {
                
                $sqlf = "select farm_id from farm where farmer_id ='$id_farmer'";
                $sqlfres = mysqli_query($connection,$sqlf);
    
    
                if(!$sqlfres){
                    echo "error";
                }
    
    
                else{
    
                while ($row = mysqli_fetch_array($sqlfres)) {
                    $farm_id = $row['farm_id'];
                }
    
                $query3="INSERT INTO crop VALUES ('','$farm_id','$cropname','$type','$state')";
                $query_run3 = mysqli_query($connection, $query3);
                if($query_run3)
                {
                    echo"success";
                }


            }

        }
        }



        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');

        }
   
    }
    
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    
    echo'<script> alert("Duplicated Username Use Different Name"); </script>';

?>