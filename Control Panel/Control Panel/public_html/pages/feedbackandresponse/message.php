<?php
include "../multilanguage/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $lang['feedback'] ?></title>
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
    <a class="active" href="message.php"><?php echo $lang['feedback'] ?></a>
    <a href="../report/report.php"><?php echo $lang['report'] ?></a>
    <a  href="../aboutus/aboutus.php"><?php echo $lang['aboutus'] ?></a>
</div>

<div class="main">
    <div class="jumbotron text-center title" style="margin-bottom:0;">
      <h1><?php echo $lang['datab'] ?> <span class="system-title"> <?php echo $lang['conpan'] ?> </span><?php echo $lang['syst'] ?> </h1>
      <p class="main-title"></p>
      <p class="sub-title"><?php echo $lang['computerscience'] ?></p> 
    </div>
      
    

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['sendmessage'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label><?php echo $lang['farmername'] ?></label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                placeholder='<?php echo $lang['enterfarmername'] ?>'>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['message'] ?></label>
                                <textarea id="message" class="form-control" name="message" rows="4" cols="50" placeholder="Enter Message Here">
                                </textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close'] ?></button>
                        <button type="submit" name="updatedata" class="btn btn-primary"><?php echo $lang['updatedata'] ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['deletemessagedata'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> <?php echo $lang['doyouwantdelete'] ?></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['no'] ?> </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"><?php echo $lang['yesd'] ?> </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <div class="jumbotron" style="margin-bottom:0;">
    <div class="container">
        
            
            <div class="card">
                <div class="card-body">
                <h2><?php echo $lang['feedbacklistform'] ?></h2>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'mobileintelligent');

                $query = "select * from farmermessage";
                $query_run = mysqli_query($connection, $query);
            ?>

            <!--tables-->
         
                    <table id="mytable" class="table">
                        <thead>
                            <tr>
                            <th hidden scope="col">message_id</th>
                                <th scope="col"><?php echo $lang['farmername'] ?></th>
                                <th scope="col"><?php echo $lang['subject'] ?></th>
                                <th scope="col"><?php echo $lang['info'] ?></th>
                                <th scope="col"><?php echo $lang['datetime'] ?></th>
                                <th scope="col"><?php echo $lang['sendmessage'] ?></th>
                                <th scope="col"> <?php echo $lang['delete'] ?></th>
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
                           
                            <td hidden> <?php echo $row['message_id']; ?> </td>
                                <td> <?php echo $row['farmer_name']; ?> </td>
                                <td> <?php echo $row['subject']; ?> </td>
                                <td> <?php echo $row['topic']; ?> </td>
                                <td> <?php echo $row['datetime']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn btn-sm"><?php echo $lang['response'] ?></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn btn-sm"><?php echo $lang['delete'] ?></button>
                                </td>
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
        <a href="message.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="message.php?lang=ar"><?php echo $lang['lang_ar'] ?></a>
        | <a href="message.php?lang=kr"><?php echo $lang['lang_kr'] ?></a>
    </div>
</body>
</html>