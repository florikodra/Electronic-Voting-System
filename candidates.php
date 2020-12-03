<?php include('conn.php');
include('session.php');?>


<?php $votues=mysqli_query($conn, "select * from votuesit where votues_id='$session_idvot'")or die (mysql_error());
$vot=mysqli_fetch_array($votues);
$statusss=$vot['status'];


$sv=$vot['sistem_id'];
$sistem=mysqli_query($conn, "select * from sistem where sistem_id='$sv'")or die (mysql_error());
$sistemvot=mysqli_fetch_array($sistem);
$ssstatus=$sistemvot['Sistem_status'];
$sistemnameee=$sistemvot['Sistem_name'];

if(($statusss=='1' and $ssstatus=='Draft') or ($statusss=='1' and $ssstatus=='Proccesing') or ($statusss=='1' and $ssstatus=='Archive')){

  ?>
  <script type="text/javascript"> alert('You dont have access in this page');
  window.location='login.php';</script><?
}
elseif ($statusss=='1' and $ssstatus=='Completed') {?>
<script type="text/javascript">
  window.location='results.php';</script><?
  
}
else{

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Voting System | Candidates" />
<meta name="description" content="Voting System |Candidates" />
<meta name="author" content="Florian Kodra" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="theme-color" content="#4169E1">
<title>Voting System - Candidates</title>

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

<!-- shop -->
<link href="css/shop.css" rel="stylesheet" type="text/css" /> 

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



<!--=================================
 mega menu -->



<!--=================================
 header -->


<!--=================================
page-title-->

<section class="page-title bg-overlay-black-60 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url(http://cimsec.org/wp-content/uploads/2017/05/pennsylvania-primary-election-guide-1-672x372.jpg);">
  <div class="container">
    <div class="row"> 
      <div class="col-lg-12"> 
      <div class="page-title-name">
          <h1>Voting System</h1>
          <p>Voter :  <?php echo $vot['name'];?></p>
        </div>
          <ul class="page-breadcrumb">
            <li><span><i class="fa fa-check"></i>Choose the candidate that you want to vote !</span></li><br>
            <li><span><i class="fa fa-laptop"></i>System name: <?php echo $sistemnameee;?></span></li>
         
       </ul>
     </div>
     </div>
  </div>
</section>

<!--=================================
page-title -->

 
<!--=================================
shop -->

  <section class="shop grid page-section-ptb">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
               <div class="row">
                
<?php    $query=mysqli_query($conn, "select * from kandidatet where sistem_id= '$sv'")or die (mysql_error());
                          while($row4=mysqli_fetch_array($query)){ ?>

                <div class="col-lg-3 col-md-3 col-xs-6 col-xx-12">
                 <div class="product mb-40">
                     <div class="product-image">
                         <img class="img-responsive center-block" src="images/avatar.png" alt="">
                         <div class="product-overlay">
                           <div class="add-to-cart">
                              <button type="button" class="button" data-toggle="modal" data-target="#myModal-details-<?php echo $row4['kandidat_id'];?>">Details</button>

							  
							  
                           </div>
                         </div>
                      </div>
                      <div class="product-des">
                         <div class="product-title">
                           <a ><?php echo $row4['kandidat_emer'];?></a>
                         </div>

                      <div class="product-price">
                           <button type="button" class="button black icon medium"  data-toggle="modal" data-target="#myModal-vote-<?php echo $row4['kandidat_id'];?>"> <i class="fa fa-check-square"></i> Vote Now </button>
                         </div>
                    </div>
                 </div>
               </div>
	
								  
							              <!-- Modal -->
            <div class="modal fade" id="myModal-details-<?php echo $row4['kandidat_id'];?>" tabindex="-1" role="dialog" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="section-title mb-10">
                      <h2>Details</h2>
                      <h4>Candidate Name: <?php echo $row4['kandidat_emer'];?></h4>
                      <p>Description: <?php echo $row4['Kandidat_description'];?></p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="button gray" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
			


							              <!-- Modal -->
            <div class="modal fade" id="myModal-vote-<?php echo $row4['kandidat_id'];?>" tabindex="-1" role="dialog" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="section-title mb-10">
                      <img class="img-responsive center-block" src="images/sure.png" alt="" width="300" height="300">
                      <h3>Are you sure that you want to vote candidate: <?php echo $row4['kandidat_emer'];?> ?</h3>
                      <h6>After accepting this, this action cannot be undone. </h6>
                    </div>
                  </div>
                  <div class="modal-footer"><center><form method="POST" action="upload-vote.php?id=<?php echo $row4['kandidat_id'];?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
					<button name="yes" type="submit" class="btn btn-success" >Yes, I am.</button></form></center>
					
                  </div>
                </div>
              </div>
            </div>			
			   

  <?php } ?>


               </div>
              </div>
           
            </div>
        </div>
    </section>
 
<!--=================================
welcome -->

<!--=================================
action box- -->

<section class="action-box theme-bg full-width">
  <div class="container">
    <div class="row">
     <div class="col-lg-12 col-md-12">
        <h3><strong> Voting System </strong>- The most powerful app.</h3>
        <p>If don't want to vote or you are not sure at the moment here is the button to logout and to save your data.</p>
        <a class="button border white" href="logout.php">
          <span>Log Out Now</span>
          <i class="fa fa-lock"></i>
       </a> 
    </div>
  </div>
 </div>
</section>
 
<!--=================================
action box- -->


<!--=================================
 footer -->
 
<footer class="footer page-section-pt black-bg">
 <div class="container">
 
   

       
      <div class="footer-widget mt-60 ">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 xs-mb-20">
           <p class="mt-15"> ©Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>  Voting System  All Rights Reserved </p>
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
<?php }?>
