<?php include('../conn.php');
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
elseif ($statusss=='1' and $ssstatus=='Completed') { ?>
<script type="text/javascript">
  window.location='results.php';</script><?php
  
}
else{

 
?>
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
<link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
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

<!-- shop -->
<link href="../css/shop.css" rel="stylesheet" type="text/css" /> 

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
 header -->



<!--=================================
 mega menu -->



<!--=================================
 header -->


<!--=================================
page-title-->


<!--=================================
page-title -->

 
<!--=================================
shop -->
<section class="action-box theme-bg full-width">
  <div class="container">
    <div class="row">
     <div class="col-lg-12 col-md-12"><center>
        <h3><strong> iVote </strong></h3>
        <p>Votoni Kandidatin.</p></center>
       
    </div>
  </div>
 </div>
</section>
 
  <section class="shop grid page-section-ptb">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
               <div class="row">
                
<?php    $query=mysqli_query($conn, "select * from kandidatet where sistem_id= '$sv'")or die (mysql_error());
                          while($row4=mysqli_fetch_array($query)){ ?>




<div class="col-lg-4 col-md-4 col-sm-4">
          <div class="feature-text border-box">
            <div class="feature-icon">
              <span class="ti-user"></span>
            </div>
            <div class="feature-info">
              <h5 class="text-back"><?php echo $row4['kandidat_emer'];?></h5>
              <p><?php echo $row4['Kandidat_description'];?></p>
            </div>
           <button type="button" class="button black icon medium"  data-toggle="modal" data-target="#myModal-vote-<?php echo $row4['kandidat_id'];?>">  Voto <i class="fa fa-check-square"></i></button>
          </div>
        </div><br>


			
							              <!-- Modal -->
            <div class="modal fade" id="myModal-vote-<?php echo $row4['kandidat_id'];?>" tabindex="-1" role="dialog" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="section-title mb-10"><center>
                      <h3>Deshironi te votoni per:<br> <?php echo $row4['kandidat_emer'];?> ?</h3></center>
                      
                    </div>
                  </div>
                  <div class="modal-footer"><center><form method="POST" action="upload-vote.php?id=<?php echo $row4['kandidat_id'];?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">JO!</button>
					          <button name="yes" type="submit" class="btn btn-success" >PO!</button></form></center>
					
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
        <a class="button border white" href="logout.php">
          <span>Log Out </span>
          <i class="fa fa-lock"></i>
       </a> 
    </div>
  </div>
 </div>
</section>
 
<!--=================================
action box- -->



 
</div>



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
<?php }?>
