<?php
include "../multilanguage/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $lang['notification'] ?></title>
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
    <a  class="active" href="firebase.php"><?php echo $lang['notification'] ?></a>
    <a href="../feedbackandresponse/message.php"><?php echo $lang['feedback'] ?></a>
    <a href="../report/report.php"><?php echo $lang['report'] ?></a>
    <a  href="../aboutus/aboutus.php"><?php echo $lang['aboutus'] ?></a>
</div>
    <div class="main">
    <div class="jumbotron text-center title" style="margin-bottom:0;">
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['sendnotification'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo $lang['news'] ?></label>
                            <input type="text" name="news" class="form-control" placeholder='<?php echo $lang['enternews'] ?>' required>
                        </div>

                        <div class="form-group">
                            <label><?php echo $lang['info'] ?></label>
                            <input type="text" name="info" class="form-control" placeholder='<?php echo $lang['enterinfo'] ?>'  >
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


    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['deletenotificationdata'] ?></h5>
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
                <h2><?php echo $lang['notificationlistform'] ?></h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    <?php echo $lang['adddata'] ?>
                    </button>
                    
                </div>
            </div>
          
            

<!--notify-->
            <?php
            
$server="localhost";
$username="root";
$password="";
$database="mobileintelligent";
$conn=new mysqli($server,$username,$password,$database);

if($conn->connect_error){
    die("connection failed:". $conn->connect_error);
}

//query check
$sql = "SELECT DATE_FORMAT(datetime, '%Y%m%d%H%i%s') as datetime,news_id,topic,info FROM notification ORDER BY news_id DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//current time
$timezone = new DateTime("now", new DateTimeZone('Asia/Baghdad') );
$current_time=$timezone->format('YmdHis');
$dataTimeDate=$row['datetime'];
//if current time equal data time
if ($current_time==date('YmdHis',strtotime($dataTimeDate))) {
  echo '<script>alert("The notification has been sent")</script>';

//firebase
function sendNotif ($to, $notif){
$apiKey='AAAApsxTuRE:APA91bH6DKO4iaUMSKPU5OSYrPQc-gth4_UAZ9cGh7kgm4oXxIJA9UcvzhnDc2AdZov7ONiEwumkOerPnJLMgZXZJZGhF8N4-3AsCn7pEMSw_W0XlZF2lOkKsWyKq5urz4PFRadqnby-';
    $feilds = array('to'=>$to, 'notification'=>$notif);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($feilds));
    
    $headers = array();
    $headers[] = 'Authorization: Key='.$apiKey;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

$to = "/topics/plant";

$notification = array(
    'title' => $row['topic'],
    'body' => $row['info'],
    'sound'=>'default',
    'click_action'=>'abc'
);

sendNotif($to, $notification);
}

?>


            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'mobileintelligent');

                $query = "SELECT * FROM notification ";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="mytable" class="table">
                        <thead>
                            <tr>
                                <th hidden scope="col">news_id</th>
                                <th scope="col"><?php echo $lang['news'] ?></th>
                                <th scope="col"><?php echo $lang['info'] ?></th>
                                <th scope="col"><?php echo $lang['datetime'] ?></th>
                                <th scope="col"><?php echo $lang['delete'] ?></th>
                               
                            
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
                                <td hidden> <?php echo $row['news_id']; ?> </td>
                                <td> <?php echo $row['topic'];?> </td>
                                <td> <?php echo $row['info'];?> </td>
                                <td> <?php echo $row['datetime'];?> </td>

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
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#news').val(data[1]);
                $('#info').val(data[2]);

            });
        });
    </script>




<script>
    $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
    

<!--multi languages-->


<div class="footer bg-dark" style="margin-bottom: 0;position: fixed; padding: 10px 10px 0px 10px;bottom: 0;height: 40px;width: 100%;background: grey;">
        <a href="firebase.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="firebase.php?lang=ar"><?php echo $lang['lang_ar'] ?></a>
        | <a href="firebase.php?lang=kr"><?php echo $lang['lang_kr'] ?></a>
    </div>
</body>
</html>
