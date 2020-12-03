<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title></title>

<!-- Favicon -->
<link rel="shortcut icon" href="../images/favicon.ico" />

<!-- font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
 
<!-- Plugins -->
<link rel="stylesheet" type="text/css" href="../css/plugins-css.css" />

<!-- Typography -->
<link rel="stylesheet" type="text/css" href="../css/typography.css" />

<!-- Shortcodes -->
<link rel="stylesheet" type="text/css" href="../css/shortcodes/shortcodes.css" />

<!-- Style -->
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="../css/responsive.css" /> 
 

</head>

<body>

 <div class="wrapper">

<!--=================================
 preloader -->
 
<div id="pre-loader">
    <img src="../images/pre-loader/loader-02.svg" alt="">
</div>

<!--=================================
 preloader -->
 
<!--=================================
 login-->
<?php include('../conn.php'); 
       ?>
<section class="login-box-main login-gradient-03 height-100vh page-section-ptb">
  <div class="login-box-main-middle">
   <div class="container">
     <div class="row row-eq-height no-gutter">


       <div class="col-md-10">
        <div class="login-box pb-50 clearfix white-bg">
        <h3 class="mb-30">iVote - Login</h3><form method="POST">
         <div class="section-field mb-20">
             <label class="mb-10" for="name">Amza* </label>
               <input id="name" class="web form-control" type="text" placeholder="Amza" name="amza">
            </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="Password">Password* </label>
               <input id="Password" class="Password form-control" type="password" placeholder="Password" name="password">
            </div>
            <center>
              <button type="submit" name="login" class="button">
                <span>Log in</span>
                <i class="fa fa-check"></i>
             </button></center>
           </form>
 
   


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
        {?><br>
          <div class="alert alert-danger" role="alert"><center>Data Valid!</center></div><?php
        }
    }
  ?>




          </div>

         </div>
        </div>
      </div>
  </div>
</section>

<!--=================================
 login-->
  

</div>

  

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div> 
 
<!--=================================
 jquery -->

<!-- jquery -->
<script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>

<!-- plugins-jquery -->
<script type="text/javascript" src="../js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '../js/';</script>
 

<!-- custom -->
<script type="text/javascript" src="../js/custom.js"></script>
 
</body>
</html>