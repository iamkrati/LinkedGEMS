 <?php
        if (isset($_POST['send']))
        {
            $msg=$_POST['message'];

        if  ($msg=='')
        {
             echo "<div class='alert alert-danger'> <strong> <center> Message was unable to send </strong> </center> </div> ";
        }
            else{
                
                $ins="insert into users_chat(Sender_email,Receiver_email,Msg_content,Msg_Status,Msg_date)  values('$email','$clicked_email','$msg','unread',NOW())";   
                mysqli_query($con,$ins);
                 echo "<script>window.location.href='chatwithstu.php?user_name=$clicked_email';</script>";
            }
        
        
        }
        ?>