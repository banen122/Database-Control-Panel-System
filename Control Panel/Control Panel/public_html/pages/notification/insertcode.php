<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'mobileintelligent');

if(isset($_POST['insertdata']))
{
    $news = $_POST['news'];
    $info = $_POST['info'];
    
    $query = "INSERT INTO notification (`topic`,`info`) VALUES ('$news','$info')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: firebase.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>