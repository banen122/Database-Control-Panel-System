<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

if(isset($_POST['insertdata']))
{
    $treatmentid= $_POST['treatmentid'];
    $treatment_name = $_POST['treatment_name'];
    $instruction = $_POST['instruction'];
    $discription=$_POST['discription'];
    

    $query = "INSERT INTO treatment (`treatment_id`,`treatment_name`,`instruction`,`discription`) VALUES ('$treatmentid','$treatment_name','$instruction','$discription')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: treatment.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>