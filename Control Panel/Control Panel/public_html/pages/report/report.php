<?php
include "../multilanguage/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $lang['report'] ?></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/design.css">

    <link rel="stylesheet" href="../css/editstyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <style>
table.dataTable tbody td{
    padding:2px 2px;
        padding-left:18px;
       }
</style>

</head>
<body>
    
<div class="sidenav center">
<a href="../index.php"><img src="../../img/cihanlog.png" width=150px></a>
<a   href="../index.php"><?php echo $lang['farmer'] ?></a>
    <a  href="../disease/disease.php"><?php echo $lang['disease'] ?></a>
    <a  href="../cliniccenter/clinkcenter.php"><?php echo $lang['clinkcenter'] ?></a>
    <a  href="../treatment/treatment.php"><?php echo $lang['treatment'] ?></a>
    <a href="../notification/firebase.php"><?php echo $lang['notification'] ?></a>
    <a  href="../feedbackandresponse/message.php"><?php echo $lang['feedback'] ?></a>
    <a class="active" href="report.php"><?php echo $lang['report'] ?></a>
    <a  href="../aboutus/aboutus.php"><?php echo $lang['aboutus'] ?></a>

</div>

<div class="main">
    <div class="jumbotron text-center title" style="margin-bottom:0;">
      <h1><?php echo $lang['datab'] ?> <span class="system-title"> <?php echo $lang['conpan'] ?> </span><?php echo $lang['syst'] ?> </h1>
      <p class="main-title"></p>
      <p class="sub-title"><?php echo $lang['computerscience'] ?></p> 
    </div>
      
    




    <div class="jumbotron" style="margin-bottom:0;">
    <div class="container">
        
            
            <div class="card">
                <div class="card-body">
                <h2><?php echo $lang['reportsystemlistform'] ?></h2>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'mobileintelligent');

                $query = "SELECT * FROM farmer,image where farmer.id_farmer=image.farmer_id";

                $query_run = mysqli_query($connection, $query);
            ?>

            <!--tables-->
         
                    <table id="mytable" class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo $lang['farmname'] ?></th>
                                <th scope="col"><?php echo $lang['datetime'] ?></th>
                            </tr>
                        </thead>
                    
                        <tbody>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                            <tr>

                                <td> <?php echo $row['farmer_name']; ?> </td>
                                <td> Uploaded Image at <?php echo $row['date']; ?> </td>
            
                            </tr>
                            <?php           
                          }
                          }            
                            else 
                            {
                            echo "No Record Found";
                            }
                       ?>
                        </tbody>
                       
                    </table>
                </div>
            </div>


        </div>
    </div>
                        



    <!-- Initialize the plugin: -->
    
 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text().trim();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#fname').val(data[1]);
            
            });
        });
    </script>



 <!--Datatable-->
<script>
    $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
<!--multi languages-->


<div class="footer bg-dark" style="margin-bottom: 0;position: fixed; padding: 10px 10px 0px 10px;bottom: 0;height: 40px;width: 100%;background: grey;">
        <a href="report.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="report.php?lang=ar"><?php echo $lang['lang_ar'] ?></a>
        | <a href="report.php?lang=kr"><?php echo $lang['lang_kr'] ?></a>
    </div>
</body>
</html>