<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $treatment_name = $_POST['treatment_name'];
        $instruction = $_POST['instruction'];
        $discription=$_POST['discription'];

        $query = "UPDATE treatment SET treatment_name='$treatment_name', instruction='$instruction', discription='$discription' WHERE treatment_id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:treatment.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>