<?php
include "../multilanguage/config.php";
?>
<html lang="en">
<head>
    <title><?php echo $lang['cliniccenter'] ?></title>
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
    <a  class="active" href="clinkcenter.php"><?php echo $lang['clinkcenter'] ?></a>
    <a   href="../treatment/treatment.php"><?php echo $lang['treatment'] ?></a>
    <a   href="../notification/firebase.php"><?php echo $lang['notification'] ?></a>
    <a href="../feedbackandresponse/message.php"><?php echo $lang['feedback'] ?></a>
    <a href="../report/report.php"><?php echo $lang['report'] ?></a>
    <a  href="../aboutus/aboutus.php"><?php echo $lang['aboutus'] ?></a>
</div>
    <div class="main">
    <div class="jumbotron text-center title">
      <h1><?php echo $lang['datab'] ?> <span class="system-title"> <?php echo $lang['conpan'] ?> </span><?php echo $lang['syst'] ?> </h1>
      <p class="main-title"></p>
      <p class="sub-title"><?php echo $lang['computerscience'] ?></p> 
    </div>
      
    
    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['addclinkcenterdata'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo $lang['clinkcentername'] ?></label>
                            <input type="text" name="clinicname" class="form-control" placeholder='<?php echo $lang['entercliniccentername'] ?>' required>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['email'] ?></label>
                            <input type="email" name="email" class="form-control" placeholder='<?php echo $lang['enteremail'] ?>' required >
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['location'] ?></label>
                            <input type="text" name="location" class="form-control" placeholder='<?php echo $lang['enterlocation'] ?>' required>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['specializationtype'] ?></label>
                            <input type="text" name="specialist" class="form-control" placeholder='<?php echo $lang['enterspecialist'] ?>'  required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['worktime'] ?></label>
                            <input type="text" name="worktime" class="form-control" placeholder='<?php echo $lang['enterworktime'] ?> 'required>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['phonenumber'] ?></label>
                            <input type="text" name="phonenumber" class="form-control" placeholder='<?php echo $lang['enterphonenumber'] ?>'  required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close'] ?></button>
                        <button type="submit" name="insertdata" class="btn btn-primary"><?php echo $lang['savedata'] ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo $lang['editclniccenterdata'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label><?php echo $lang['clinkcentername'] ?></label>
                            <input type="text" name="clinkname" id="clinkname" class="form-control"
                                placeholder='<?php echo $lang['entercliniccentername'] ?>'>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['email'] ?></label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder='<?php echo $lang['enteremail'] ?>' >
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['location'] ?></label>
                            <input type="text" name="location" id="location" class="form-control"
                                placeholder='<?php echo $lang['enterlocation'] ?>'>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['specializationtype'] ?> </label>
                            <input type="text" name="specialist" id="specialization" class="form-control"
                                placeholder='<?php echo $lang['enterspecialist'] ?>'>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['worktime'] ?></label>
                            <input type="text" name="worktime" id="worktime" class="form-control"
                                placeholder='<?php echo $lang['enterworktime'] ?>'>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['phonenumber'] ?></label>
                            <input type="text" name="phonenumber" id="phonenumber" class="form-control"
                                placeholder='<?php echo $lang['enterphonenumber'] ?>'>
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['deletecliniccenterdata'] ?></h5>
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



    <div class="jumbotron">
    <div class="container">
            <div class="card">
                <div class="card-body">
                <h2><?php echo $lang['clniccenterlistform'] ?></h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    <?php echo $lang['adddata'] ?>
                    </button>
                    
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'mobileintelligent');

                $query = "SELECT * FROM cliniccenter";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="mytable" class="table">
                        <thead>
                            <tr>
                                <th hidden scope="col">clinkcenter ID</th>
                                <th scope="col"><?php echo $lang['clinkcentername'] ?></th>
                                <th scope="col"><?php echo $lang['email'] ?></th>
                                <th scope="col"><?php echo $lang['location'] ?></th>
                                <th scope="col"><?php echo $lang['specializationtype'] ?></th>
                                <th scope="col"><?php echo $lang['worktime'] ?></th>
                                <th scope="col"><?php echo $lang['phonenumber'] ?></th>
                                <th scope="col"> <?php echo $lang['edit'] ?> </th>
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
                                <td hidden> <?php echo $row['clinic_id']; ?> </td>
                                <td> <?php echo $row['clinic_name']; ?> </td>
                                <td> <?php echo $row['Email']; ?> </td>
                                <td> <?php echo $row['location']; ?> </td>
                                <td> <?php echo $row['specialist']; ?> </td>
                                <td> <?php echo $row['work_time']; ?> </td>
                                <td> <?php echo $row['phone_number']; ?> </td>
                                
                                <td>
                                    <button type="button" class="btn btn-success btn-sm editbtn"> <?php echo $lang['edit'] ?></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger  btn-sm deletebtn"><?php echo $lang['delete'] ?></button>
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
                $('#clinkname').val(data[1]);
                $('#email').val(data[2]);
                $('#location').val(data[3]);
                $('#specialization').val(data[4]);
                $('#worktime').val(data[5]);
                $('#phonenumber').val(data[6]);
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
        <a href="clinkcenter.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="clinkcenter.php?lang=ar"><?php echo $lang['lang_ar'] ?></a>
        | <a href="clinkcenter.php?lang=kr"><?php echo $lang['lang_kr'] ?></a>
    </div>
</body>
</html>
