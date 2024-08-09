<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $clinkname= $_POST['clinkname'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $specialist = $_POST['specialist'];
        $worktime = $_POST['worktime'];
        $phonenumber = $_POST['phonenumber'];

        $query = "UPDATE cliniccenter SET clinic_name='$clinkname', Email='$email',location='$location', specialist='$specialist',work_time='$worktime', phone_number='$phonenumber' WHERE clinic_id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:clinkcenter.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>