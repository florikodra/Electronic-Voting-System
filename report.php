<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Voting System | Report/Contact" />
<meta name="description" content="Voting System | Report/Contact" />
<meta name="author" content="Florian Kodra" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="theme-color" content="#4169E1">
<title>Voting System | Report/Contact</title>

<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
 
<!-- Plugins -->
<link rel="stylesheet" type="text/css" href="css/plugins-css.css" />

<!-- Typography -->
<link rel="stylesheet" type="text/css" href="css/typography.css" />

<!-- Shortcodes -->
<link rel="stylesheet" type="text/css" href="css/shortcodes/shortcodes.css" />

<!-- Style -->
<link rel="stylesheet" type="text/css" href="css/style.css" />

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css" /> 
 
 
</head>

<body>

<div class="wrapper">

<!--=================================
 preloader -->
 
<div id="pre-loader">
    <img src="images/pre-loader/loader-03.svg" alt="">
</div>

<!--=================================
 preloader -->

<!--=================================
login -->

<section class="login white-bg o-hidden scrollbar">
  <div class="container-fluid p-0">
    <div class="row row-eq-height no-gutter height-100vh">
      <div class="col-md-6 parallax" style="background-image: url(images/Contactus.jpg);">
      </div>
      <div class="col-lg-5 col-md-6">
        <div class="vertical-align full-width">
        <div class="login-14">
          <h1>Contact / Report</h1>
          
          <form method="POST" >
          <div class="pb-50 clearfix white-bg">
            <div class="section-field mb-20">
             <label class="mb-10" for="name">Email* </label>
               <input id="name" class="web form-control" type="email" placeholder="user@example.com" name="email">
             <label class="mb-10" for="name">Name* </label>
               <input id="name" class="web form-control" type="text" placeholder="Firstname Lastname" name="name">
            </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="name">Choose Subject* </label>
               <select id="name" class="web form-control" type="text" name="subject">
                <option></option>
                <option>Contact for information.</option>
                <option>Report for a problem.</option>
              </select>
            </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="Password">Description </label>
               <textarea id="text" class="web form-control" type="text" name="description"></textarea>
            </div>

              <button type="submit" class="button" name="report" ><span>Send </span> <i class="fa fa-envelope"></i></button>
             
             <p class="mt-20 mb-0">Go to <a href="index.php">MAIN PAGE</a></p>
          </div>
          </form>


<?php
include('conn.php');
  if (isset($_POST['report']))
    {
      $email = $_POST['email'];
      $name = $_POST['name'];
      $subject = $_POST['subject'];
      $description = $_POST['description'];
      $to = "info@florikodra.com";
      $body='Email: '.$email .' <br> Description: '.$description .'';

      
      
      mysqli_query($conn,"insert into report (email, name, subject, message) values ('$email', '$name', '$subject', '$description')");
      

      $headers = 'From: Sistemi i Votimit Elektronik <'.$email .'>' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
      mail($to, $subject, $body, $headers);
      header('location: report.php');
          exit;
    }
  ?>




        </div>
      </div>
     </div>
    </div>
  </div>
</section>

<!--=================================
 login -->
  
</div>
  

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>
 
<!--=================================
 jquery -->

<!-- jquery -->
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>

<!-- plugins-jquery -->
<script type="text/javascript" src="js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = 'js/';</script>
 

<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
 
</body>
</html>