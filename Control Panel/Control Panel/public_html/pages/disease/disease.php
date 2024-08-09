<?php
 include "../multilanguage/config.php";
 ?>
<html lang="en">
<head>
    <title><?php echo $lang['disease'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/design.css">
    <link rel="stylesheet" type="text/css" href="../../lib/DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../lib/multiselect/multi-select.css"/>
    <link rel="stylesheet" type="text/css" href="../css/editstyle.css"/>
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
    <a  class="active" href="disease.php"><?php echo $lang['disease'] ?></a>
    <a   href="../cliniccenter/clinkcenter.php"><?php echo $lang['clinkcenter'] ?></a>
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['adddiseasedata'] ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            
                            <label><?php echo $lang['cropid'] ?></label>
                            <input type="text" name="cropid" class="form-control" placeholder='<?php echo $lang['entercropid'] ?>' required>
                        </div>

                        <div class="form-group">
                            <label> <?php echo $lang['diseasename'] ?> </label>
                            <input type="text" name="diseasename" class="form-control" placeholder='<?php echo $lang['enterdiseasename'] ?>'  required>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['reason'] ?> </label>
                            <input type="text" name="reason" class="form-control" placeholder='<?php echo $lang['enterreason'] ?>'  required>
                        </div>
                        <div class="form-group">
                            <label> <?php echo $lang['treatmentid'] ?>  </label>
                            <input type="text" name="treatmentid" class="form-control" placeholder='<?php echo $lang['entertreatmentid'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label> <?php echo $lang['diseasenumber'] ?>  </label>
                            <input type="text" name="diseasenumber" class="form-control" placeholder='<?php echo $lang['enterdiseasenumber'] ?>'  required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close'] ?></button>
                        <button type="submit" name="insertdata" class="btn btn-primary"><?php echo $lang['savedata'] ?> </button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo $lang['editdiseasedata'] ?>  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label><?php echo $lang['cropid'] ?> </label>
                            <input type="text" name="cropid" id="cropid" class="form-control"
                                placeholder='<?php echo $lang['entercropid'] ?>'>
                        </div>

                        <div class="form-group">
                            <label> <?php echo $lang['diseasename'] ?>  </label>
                            <input type="text" name="diseasename" id="diseasename" class="form-control"
                                placeholder='<?php echo $lang['enterdiseasename'] ?>' >
                        </div>
                        <div class="form-group">
                            <label> <?php echo $lang['reason'] ?> </label>
                            <input type="text" name="reason" id="reason" class="form-control"
                                placeholder='<?php echo $lang['enterreason'] ?>'>
                        </div>
                        <div class="form-group">
                            <label> <?php echo $lang['treatmentid'] ?>  </label>
                            <input type="text" name="treatmentid"id="treatmentid" class="form-control" placeholder='<?php echo $lang['entertreatmentid'] ?>'  required>
                        </div>
                        <div class="form-group">
                            <label> <?php echo $lang['diseasenumber'] ?>  </label>
                            <input type="text" name="diseasenumber" id="diseasenumber"class="form-control" placeholder='<?php echo $lang['enterdiseasenumber'] ?>'  required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close'] ?> </button>
                        <button type="submit" name="updatedata" class="btn btn-primary"><?php echo $lang['updatedata'] ?> </button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo $lang['deletediseasedata'] ?>  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4><?php echo $lang['doyouwantdelete'] ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <?php echo $lang['no'] ?> </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> <?php echo $lang['yesd'] ?> </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <div class="jumbotron" style="margin-bottom:0;">
    <div class="container">
     
            
            <div class="card">
                <div class="card-body">
                <h2> <?php echo $lang['diseaselistform'] ?></h2>
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

                $query = "SELECT * FROM disease";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="mytable" class="table ">
                        <thead>
                            <tr>
                                <th hidden scope="col"> <?php echo $lang['diseaseid'] ?></th>
                                <th scope="col"><?php echo $lang['cropid'] ?></th>
                                <th scope="col"><?php echo $lang['diseasename'] ?></th>
                                <th scope="col"><?php echo $lang['reason'] ?></th>
                                <th scope="col"><?php echo $lang['treatmentid'] ?></th>
                                <th scope="col"><?php echo $lang['diseasenumber'] ?></th>
                                <th scope="col"><?php echo $lang['edit'] ?></th>
                                <th scope="col"> <?php echo $lang['delete'] ?> </th>
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
                                <td hidden> <?php echo $row['disease_id']; ?> </td>
                                <td> <?php echo $row['crop_id']; ?> </td>
                                <td> <?php echo $row['disease_name']; ?> </td>
                                <td> <?php echo $row['reason']; ?> </td>
                                <td scope="col"><?php echo $row['treatment_id']; ?> </th>
                                <td scope="col"><?php echo $row['disease_number']; ?></th>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm editbtn"> <?php echo $lang['edit'] ?> </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deletebtn"> <?php echo $lang['delete'] ?> </button>
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
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#cropid').val(data[1]);
                $('#diseasename').val(data[2]);
                $('#reason').val(data[3]);
                $('#treatmentid').val(data[4]);
                $('#diseasenumber').val(data[5]);
            });
        });
    </script>

    <!--Datatable-->
<script>
    $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
  <!--language-->

  <div class="footer bg-dark" style="margin-bottom: 0;position: fixed; padding: 10px 10px 0px 10px;bottom: 0;height: 40px;width: 100%;background: grey;">
        <a href="disease.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="disease.php?lang=ar"><?php echo $lang['lang_ar'] ?></a>
        | <a href="disease.php?lang=kr"><?php echo $lang['lang_kr'] ?></a>
    </div>
</body>
</html>
