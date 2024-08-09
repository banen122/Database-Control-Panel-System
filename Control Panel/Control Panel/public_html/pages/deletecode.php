<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];
    $idf = $_POST['deletef_id'];
    $query = "DELETE FROM farmer WHERE id_farmer='$id'";
    $query2 = "DELETE FROM farm WHERE farmer_id='$id'";
    $query3 = "DELETE FROM crop WHERE farm_id='$idf'";
    $query_run3 = mysqli_query($connection, $query3);
    $query_run2 = mysqli_query($connection, $query2);
    $query_run = mysqli_query($connection, $query);
    
    

    if($query_run&&$query_run2&&$query_run3)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted Maybe Its constraint with another table!!"); </script>';
    }
}

?>