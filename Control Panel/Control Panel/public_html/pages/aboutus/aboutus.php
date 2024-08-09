<?php
include "../multilanguage/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $lang['aboutus'] ?></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/design.css">
    <link rel="stylesheet" href="../css/editstyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>


</head>
<body>
    
<div class="sidenav center">
    <a href="index.php"><img src="../../img/cihanlog.png" width=150px></a>
    <a   href="../index.php"><?php echo $lang['farmer'] ?></a>
    <a  href="../disease/disease.php"><?php echo $lang['disease'] ?></a>
    <a  href="../cliniccenter/clinkcenter.php"><?php echo $lang['clinkcenter'] ?></a>
    <a  href="../treatment/treatment.php"><?php echo $lang['treatment'] ?></a>
    <a href="../notification/firebase.php"><?php echo $lang['notification'] ?></a>
    <a  href="../feedbackandresponse/message.php"><?php echo $lang['feedback'] ?></a>
    <a href="../report/report.php"><?php echo $lang['report'] ?></a>
    <a class="active" href="aboutus.php"><?php echo $lang['aboutus'] ?></a>
</div>

<div class="main">
    <div class="jumbotron text-center title" style="margin-bottom:0;">
      <h1><?php echo $lang['aboutus'] ?> </h1>
      <p class="main-title"></p>
      <p class="sub-title"><?php echo $lang['computerscience'] ?></p> 
    </div>
      

        </div>

                        

    
 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>




</body>
</html>