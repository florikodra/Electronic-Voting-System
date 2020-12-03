<?php include('conn.php');
include('session.php');?>

<?php $votues=mysqli_query($conn, "select * from votuesit where votues_id='$session_idvot'")or die (mysql_error());
$vot=mysqli_fetch_array($votues);
$vot_table=$vot['sistem_id'];
$votnameee=$vot['name'];

$voting=mysqli_query($conn, "select * from sistem where sistem_id='$vot_table'")or die (mysql_error());
$vot=mysqli_fetch_array($voting);

$Candidats=mysqli_query($conn, "select * from kandidatet where sistem_id='$vot_table'")or die (mysql_error());
$cand=mysqli_num_rows($Candidats);

$Voters=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table'")or die (mysql_error());
$voter=mysqli_num_rows($Voters);

$Voters1=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='1'")or die (mysql_error());
$voter1=mysqli_num_rows($Voters1);

$Voters0=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='0'")or die (mysql_error());
$voter0=mysqli_num_rows($Voters0);

$result= ($voter1 / $voter)*100;


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="" />
<title>Voting System - Results</title>

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
 header -->


</div>

<!--=================================
 mega menu -->


<!--=================================
 header -->


<!--=================================
page-title-->

<section class="page-title bg-overlay-black-60 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url(https://www.recruitmentindia.in/wp-content/uploads/2017/10/46312233_m.jpg);">
  <div class="container">
    <div class="row"> 
      <div class="col-lg-12"> 
      <div class="page-title-name">
          <h1>RESULTS OF THE VOTING PROCCESS</h1>
          <p>Voter: <?php echo $votnameee; ?></p>
        </div>
          
     </div>
     </div>
  </div>
</section>

<!--=================================
page-title -->

 
 <!--=================================
 pricing -->
 
    <section class="page-section-ptb white-bg">
        <div class="container">
           
         <div class="row">
              <div class="col-lg-12 col-md-12 mb-60">
                <ul class="price">
                  <li class="header">Voting Table : <?php echo $vot['Sistem_name'];?></li>
                  <li class="grey">Completed: <strong><?php echo $result;?> %</strong></li>
                  <li>ID: <strong><?php echo $vot['sistem_id'];?></strong></li>
                  <li>Status: <strong><?php echo $vot['Sistem_status'];?></strong></li>
                  
                </ul>
              </div>
              
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h4 class="mb-50">CANDIDATES</h4>
            </div>
           </div>
            <div class="row">


<?$query=mysqli_query($conn, "select * from kandidatet where sistem_id= '$vot_table'")or die (mysql_error());
                          while($row4=mysqli_fetch_array($query)){ 
                            $kand=$row4['kandidat_id'];
                            

                            $Voterskand=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='1' and kandidat_id='$kand'")or die (mysql_error());
                            $voterkand=mysqli_num_rows($Voterskand);
                            
                            $newww=mysqli_query($conn, "select * from votuesit where sistem_id='$vot_table' and status='1'")or die (mysql_error());
                            $nw=mysqli_num_rows($newww);

                            $value=@(($voterkand/$nw)*100);
                            
                            
                            ?>
                <div class="col-lg-4 col-md-4 col-sm-4 mb-60">
                    <div class="pricing-table boxed active">
                     <div class="pricing-top">
                       <div class="pricing-title">
                        <img class="img-responsive center-block" src="images/avatar.png" alt="" width="200" height="200">
                         <h3 class="mb-15"><?php echo $row4['kandidat_emer'];?></h3>
                         <p><?php echo $row4['Kandidat_description'];?></p>
                       </div>
                       <div class="pricing-prize">
                         <h2><?php echo $value;?>%</h2>
                       </div>
                      
                     <div class="pricing-content">
                       <div class="pricing-table-list">
                            <ul class="list-unstyled">
                                <li> <i class="fa fa-check"></i>Nr. Voters: <?php echo $voterkand;?><span class="tooltip-content pull-right" data-placement="top" data-toggle="tooltip" data-original-title="Correct number of voters that has vote for this candidate"><i class="fa fa-info"></i></span></li>
                               
                            </ul>
                        </div>
                     </div>
                  </div> 
                </div>
                



            </div>

<?}?>
         

        </div>
    </section>
 
<!--=================================
 pricing -->


<!--=================================
action box- -->

<section class="action-box theme-bg full-width">
  <div class="container">
    <div class="row">
     <div class="col-lg-12 col-md-12">
        <h3><strong> Voting System </strong>- The most powerful app.</h3>
        <a class="button border white" href="logout.php">
          <span>Log Out Now</span>
          <i class="fa fa-lock"></i>
       </a> 
    </div>
  </div>
 </div>
</section>
 
<!--=================================
action box- <--> 
 
 
<!--=================================
 footer -->
 
<footer class="footer page-section-pt black-bg">
 <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 xs-mb-20">
           <p class="mt-15"> ©Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>Voting System All Rights Reserved </p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 text-right">
            <div class="footer-social mt-10">
              <ul class="list-inline text-right xs-text-left">
                 <li><a href="report.php">Report a Problem</a> </li>
              </ul>
              </div>
          </div>
        </div>    
      
  </div>
</footer>

<!--=================================
 footer -->

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