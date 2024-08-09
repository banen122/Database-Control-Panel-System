<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $cropid = $_POST['cropid'];
        $diseasename = $_POST['diseasename'];
        $reason = $_POST['reason'];
        $treatmentid= $_POST['treatmentid'];
        $diseasenumber = $_POST['diseasenumber'];

        $query = "UPDATE disease SET crop_id='$cropid', disease_name='$diseasename',reason='$reason',treatment_id='$treatmentid',disease_number='$diseasenumber'WHERE disease_id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:disease.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>