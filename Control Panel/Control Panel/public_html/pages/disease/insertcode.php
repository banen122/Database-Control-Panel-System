<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

if(isset($_POST['insertdata']))
{
    $cropid = $_POST['cropid'];
    $diseasename = $_POST['diseasename'];
    $reason = $_POST['reason'];
    $treatmentid= $_POST['treatmentid'];
    $diseasenumber = $_POST['diseasenumber'];

    $query = "INSERT INTO disease (`crop_id`,`disease_name`,`reason`,`treatment_id`,`disease_number`) VALUES ('$cropid','$diseasename','$reason','$treatmentid','$diseasenumber')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: disease.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>