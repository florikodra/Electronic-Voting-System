<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Voting System | Voter Login Area" />
<meta name="description" content="Voting System | Voter Login Area" />
<meta name="author" content="Florian Kodra" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="theme-color" content="#4169E1">
<title>Voting System | Voter Login Area</title>

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
<?php 
$amza=$_GET['amza'];
$password=$_GET['password'];


?>

 
<!--=================================
 login-->

<section class="height-100vh page-section-ptb login login-gradient-02 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url('video/video.jpg');" data-jarallax-video="mp4:video/video.mp4,webm:video/video.webm,ogv:video/video.ogv">
  <div class="container">
     <div class="row row-eq-height no-gutter vertical-align">
       <div class="col-md-4 col-md-offset-2 login-fancy-bg bg-overlay-black-30" style="background: url(https://www.aiche.org/sites/default/files/styles/chenected_lead_image/public/images/Chenected/lead/shutterstock318750845.jpg?itok=Ie66xVbt);">
         <div class="login-fancy pos-r">
          <h2 class="text-white mb-20">Voting System</h2>
          <p class="mb-20 text-white">Welcome to the voters area. After logging in please chose the candidate and wait until voting process is over so you can see the results.</p>
          <ul class="list-unstyled list-inline pos-bot pb-30">
            <li><a class="text-white" href="index.php">Back to Home Page</a> </li><br>
             <li><a class="text-white" href="report.php">Report a Problem</a> </li>
          </ul>
         </div> 
       </div>
       <?php include('conn.php'); 
       ?>
       
       <div class="col-md-4 white-bg">
        <div class="login-fancy pb-40 clearfix">
        <h3 class="mb-30">Login</h3><form method="POST" >
         <div class="section-field mb-20">
             <label class="mb-10" for="name">Amza* </label>
               <input id="name" class="web form-control" type="text" placeholder="Amza" name="amza" value="<?php echo $amza; ?>">
            </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="Password">Password* </label>
               <input id="Password" class="Password form-control" type="password" placeholder="Password" name="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            
              <button type="submit" name="login" class="button black">
                <span>Log in</span>
                <i class="fa fa-check"></i>
             </button></form>
          </div>
        </div>
      </div>
    
    <?php
  if (isset($_POST['login']))
    {
      $amza = $_POST['amza'];
      $password = $_POST['password'];
      $hashed_password = hash('sha512', $password);
      
      $query    = mysqli_query($conn, "SELECT * FROM votuesit WHERE  password='$hashed_password' and amza='$amza'");
      $row    = mysqli_fetch_array($query);
      $num_row  = mysqli_num_rows($query);
      
      if ($num_row > 0) 
        { 
          session_start();
          $_SESSION['idvot']=$row['votues_id'];
          header('location: candidates.php');
          exit;
          
        }
      else
        {?>
          <script>

    alert("Data Valid");

</script><?
        }
    }
  ?>



  </div>
</section>

<!--=================================
 login-->
  

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