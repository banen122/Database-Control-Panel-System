<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

if(isset($_POST['insertdata']))
{
    $clinicname= $_POST['clinicname'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $specialist = $_POST['specialist'];
    $worktime = $_POST['worktime'];
    $phonenumber = $_POST['phonenumber'];

    $query = "INSERT INTO cliniccenter (`clinic_name`,`Email`,`location`,`specialist`,`work_time`,`phone_number`) VALUES ('$clinicname','$email','$location','$specialist','$worktime','$phonenumber')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: clinkcenter.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>