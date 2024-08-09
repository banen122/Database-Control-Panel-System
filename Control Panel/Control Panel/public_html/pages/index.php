<?php
include "multilanguage/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $lang['farmer'] ?></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../lib/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/bootstrap-4.3.1/css/design.css">
    <link rel="stylesheet" href="css/editstyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

<style>
table.dataTable tbody td{
        padding:2px 2px;
        padding-left:18px;
       }
</style>

</head>
<body>
    
<div class="sidenav center" >
    <a href="index.php"><img src="../img/cihanlog.png" width=150px></a>
    <a class="active" href="index.php"><?php echo $lang['farmer'] ?></a>
    <a href="disease/disease.php"><?php echo $lang['disease'] ?></a>
    <a href="cliniccenter/clinkcenter.php"><?php echo $lang['clinkcenter'] ?></a>
    <a href="treatment/treatment.php"><?php echo $lang['treatment'] ?></a>
    <a href="notification/firebase.php"><?php echo $lang['notification'] ?></a>
    <a href="feedbackandresponse/message.php"><?php echo $lang['feedback'] ?></a>
    <a href="report/report.php"><?php echo $lang['report'] ?></a>
    <a  href="aboutus/aboutus.php"> <?php echo $lang['aboutus'] ?></a>
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['addfarmerdata'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo $lang['farmername'] ?></label>
                            <input type="text" name="fname" class="form-control" placeholder='<?php echo $lang['enterfarmername'] ?>' required>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['phonenumber'] ?></label>
                            <input type="tel" name="lname" class="form-control" placeholder='<?php echo $lang['enterphonenumber'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['password'] ?><?php echo $lang['feedback'] ?></label>
                            <input type="text" name="password" class="form-control" placeholder='<?php echo $lang['enterpassword'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['farmname'] ?></label>
                            <input type="text" name="farmname" class="form-control" placeholder='<?php echo $lang['enterfarmname'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['location'] ?></label>
                            <input type="text" name="location" class="form-control" placeholder='<?php echo $lang['enterlocation'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['space'] ?></label>
                            <input type="text" name="space" class="form-control" placeholder='<?php echo $lang['enterspace'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['cropname'] ?></label>
                            <select class="form-control" name="cropname" onChange="combo(this, 'demo')">
                            <option>tomato</option>
                            <option>potato</option>
                            <option>orange</option>
                            <option>banana</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['type'] ?></label>
                            <select class="form-control" name="type" onChange="combo(this, 'demo')">
                            <option>summer</option>
                            <option>winter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['state'] ?></label>
                            <select class="form-control" name="state" onChange="combo(this, 'demo')">
                            <option>cover</option>
                            <option>uncover</option>
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo $lang['editfarmerdata'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">
                        <input type="hidden" name="updatec_id" id="update_idc">

                        <div class="form-group">
                            <label><?php echo $lang['farmername'] ?></label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                placeholder='<?php echo $lang['enterfarmername'] ?>'>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['phonenumber'] ?></label>
                            <input type="tel" name="lname" id="lname" class="form-control"
                                placeholder='<?php echo $lang['enterphonenumber'] ?>' >
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['password'] ?></label>
                            <input type="text" name="password" id="password" class="form-control"
                                placeholder='<?php echo $lang['enterpassword'] ?>'>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['farmname'] ?></label>
                            <input type="text" name="farmname" id="farmname" class="form-control"
                                placeholder='<?php echo $lang['enterfarmname'] ?>'>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['location'] ?></label>
                            <input type="text" name="location" id="location" class="form-control"
                                placeholder='<?php echo $lang['enterlocation'] ?>'>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['space'] ?></label>
                            <input type="text" name="space" id="space" class="form-control"
                                placeholder='<?php echo $lang['enterspace'] ?>'>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['cropname'] ?></label>
                            <select class="form-control" name="cropname" id="cropname" onChange="combo(this, 'demo')">
                            <option>tomato</option>
                            <option>potato</option>
                            <option>orange</option>
                            <option>banana</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['type'] ?></label>
                            <select class="form-control" name="type" id="type" onChange="combo(this, 'demo')">
                            <option>summer</option>
                            <option>winter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo $lang['state'] ?></label>
                            <select class="form-control" name="state" id="state" onChange="combo(this, 'demo')">
                            <option>cover</option>
                            <option>uncover</option>
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['deletefarmerdata'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">
                        <input type="hidden" name="deletef_id" id="deletef_id">

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
                <h2><?php echo $lang['farmerlistform'] ?></h2>
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

                $query = "SELECT * FROM farmer JOIN farm
                ON  farmer.id_farmer=farmer_id JOIN crop
                ON farm.farm_id = crop.farm_id;";
                $query_run = mysqli_query($connection, $query);
            ?>

            <!--tables-->
         
                    <table id="mytable" class="table">
                        <thead>
                            <tr>
                            <th hidden scope="col"><?php echo $lang['idfarmer']  ?></th>
                                <th scope="col"><?php echo $lang['farmername'] ?></th>
                                <th scope="col"><?php echo $lang['phonenumber'] ?></th>
                                <th scope="col"><?php echo $lang['password'] ?></th>
                                <th scope="col"><?php echo $lang['farmname'] ?> </th>
                                <th scope="col"><?php echo $lang['location'] ?></th>
                                <th scope="col"><?php echo $lang['space'] ?></th>
                                <th scope="col"><?php echo $lang['cropid'] ?></th>
                                <th scope="col"><?php echo $lang['cropname'] ?></th>
                                <th scope="col"><?php echo $lang['type'] ?></th>
                                <th scope="col"><?php echo $lang['state'] ?></th>
                                <th hidden scope="col">farm_id</th>
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
                           
                            <td hidden> <?php echo $row['id_farmer']; ?> </td>
                                <td> <?php echo $row['farmer_name']; ?> </td>
                                <td> <?php echo $row['phone_number']; ?> </td>
                                <td> <?php echo $row['password']; ?> </td>
                                <td> <?php echo $row['farm_name']; ?> </td>
                                <td> <?php echo $row['location']; ?> </td>
                                <td> <?php echo $row['space']; ?> </td>
                                <td> <?php echo $row['crop_id']; ?> </td>
                                <td> <?php echo $row['crop_name']; ?> </td>
                                <td> <?php echo $row['type']; ?> </td>
                                <td> <?php echo $row['state']; ?> </td>
                                <td hidden > <?php echo $row['farm_id']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn btn-sm"> <?php echo $lang['edit'] ?></button>
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
                    return $(this).text().trim();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
                $('#deletef_id').val(data[11]);

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
                $('#lname').val(data[2]);
                $('#password').val(data[3]);
                $('#farmname').val(data[4]);
                $('#location').val(data[5]);
                $('#space').val(data[6]);
                $('#cropname').val(data[8]);
                $('#type').val(data[9]);
                $('#state').val(data[10]);
                $('#update_idc').val(data[11]);
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
        <a href="index.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="index.php?lang=ar"><?php echo $lang['lang_ar'] ?></a>
        | <a href="index.php?lang=kr"><?php echo $lang['lang_kr'] ?></a>
    </div>
</body>
</html>