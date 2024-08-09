<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'mobileintelligent');
if(isset($_POST['updatedata']))
{
    $fname = $_POST['fname'];
    $message = trim($_POST['message']);

    $query = "SELECT phone_token from token where farmer_name='$fname' ";
    
    $query_run = mysqli_query($connection, $query);


    if($query_run)
    {
        echo"executed";

    
         //firebase function
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
                echo "New record created successfully and send notification to the app";
            }



        foreach($query_run as $row)
         { 
         
            $token=$row['phone_token'];
            echo"executed";
         
         
         $querys = "INSERT INTO servermessage (`farmer_name`,`message`) VALUES ('$fname','$message')";
         $query_runs = mysqli_query($connection, $querys);
     

                    $sql = "SELECT DATE_FORMAT(datetime, '%Y%m%d%H%i') as datetime,message FROM servermessage ORDER BY message_id DESC LIMIT 1";
                    $result = $connection->query($sql);
                    $row = $result->fetch_assoc();

                    //current time
                    $timezone = new DateTime("now", new DateTimeZone('Asia/Baghdad') );
                    $current_time=$timezone->format('YmdHi');
                    $dataTimeDate=$row['datetime'];
                    //if current time equal data time
                    if ($current_time==date('YmdHi',strtotime($dataTimeDate))) {
                    

                    
                     //firebase calling function
                    $to = $GLOBALS['token'];

                    $notification = array(
                        'title' => "You Have Received Message",
                        'body' => $row['message'],
                        'sound'=>'default',
                        'click_action'=>'abc'
                    );

                   sendNotif($to, $notification);
                    }
                    

                    header('Location: message.php');
                }
             
        }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>