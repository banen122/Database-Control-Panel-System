<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        $idf = $_POST['updatec_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $farmname= $_POST['farmname'];
        $location= $_POST['location'];
        $space = $_POST['space'];
        $cropname = $_POST['cropname'];
        $type = $_POST['type'];
        $state = $_POST['state'];

       $query = "UPDATE farmer SET farmer_name='$fname', phone_number='$lname', password='$password' WHERE id_farmer='$id'  ";
        $query2 = "UPDATE farm SET farm_name='$farmname', location='$location', space='$space' WHERE farmer_id='$id'";
        $query3 = "UPDATE crop SET crop_name='$cropname', type='$type', state='$state' WHERE farm_id='$idf'";
        $query_run = mysqli_query($connection, $query);
        $query_run2 = mysqli_query($connection, $query2);
        $query_run3 = mysqli_query($connection, $query3);

        if($query_run&&$query_run2&&$query_run3)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>