<?php
include('conn.php');
include('session.php');


{                                     $name=$_POST['name'];                                   
                                      $email=$_POST['email'];
                                      $amza=$_POST['amza'];
                                      $sistem_id=$_POST['sistem_id'];

        $result1=mysqli_query($conn,"select * from votuesit where name='$name' and email='$email' and amza='$amza' and sistem_id='$sistem_id'");
        $numresult1=mysqli_num_rows($result1);

        if($numresult1 > 0){
          ?>
         
          <script type="text/javascript">
            alert("Voter Exists in Database");
             window.location='voters.php';





           
          </script>
          <?
        }
        else{


                                      $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
                                      $password = substr(str_shuffle($chars), 0, 10);
        $emailtjt = "info@florikodra.com";                             
        $to = $email;
        $subject = 'Sistemi i Votimit Elektronik - Te Dhenat per: ' . $name . ' - Sistemi: ' . $sistem_id . '';
        $message = '<h2>Pershendetje, <strong>' . $name . '</strong></h2><br><br>'
                . 'Po ju dergojme te dhenat e juaja ne lidhje me procesin e votimit me id si ne subjekt!<br>'
                . 'Linku per tu loguar eshte : <a href="http://diploma.florikodra.com">LOGOHUNI KETU</a><br>'
                . 'Amza juaj eshte : <strong>' . $amza . '</strong><br>'
                . 'Paswordi juaj eshte :<strong> ' . $password . '</strong><br>'
                . 'Linku per tu loguar automatikisht eshte : <a href="http://diploma.florikodra.com/login.php?amza=' . urlencode($amza). '&password=' . urlencode($password) . '"">AUTOMATIKISHT</a><br>'
                . 'Keto te dhena jane konfidenciale ju lutem ruajini keto pasi jane personale! <br>';
        $headers = 'From: Sistemi i Votimit Elektronik <'.$emailtjt .'>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

        mail($to, $subject, $message, $headers);
            
$hashed_password = hash('sha512', $password);




            $save=   mysqli_query($conn, "insert into votuesit(name, email, password, amza, sistem_id) VALUES ('$name','$email','$hashed_password','$amza','$sistem_id')");

                ?> <script>
     window.location='voters.php';
     </script>
        <?php                   
    }}exit();    
?>
