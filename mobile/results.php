<?php include('../conn.php');
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
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="" />
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

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="../css/responsive.css" /> 
 

</head>

<body> 


<section class="action-box theme-bg full-width">
  <div class="container">
    <div class="row">
     <div class="col-lg-12 col-md-12"><center>
        <h3><strong> iVote </strong></h3>
        <p>Rezultatet.</p></center>
       
    </div>
  </div>
 </div>
</section>





 

 
    <section class="page-section-ptb white-bg">
        <div class="container">
           
         <div class="row">
              <div class="col-lg-12 col-md-12 mb-60">
                <ul class="price">
                  <li class="header"><?php echo $vot['Sistem_name'];?></li>
                  <li class="grey">Completed: <strong><?php echo $result;?> %</strong></li>
                  <li>Status: <strong><?php echo $vot['Sistem_status'];?></strong></li>
                  
                </ul>
              </div>
              
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h4 class="mb-50">Kandidatet</h4>
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
                         <h3 class="mb-15"><?php echo $row4['kandidat_emer'];?></h3>
                         <p><?php echo $row4['Kandidat_description'];?></p>
                       </div>
                       <div class="pricing-prize">
                         <h2><?php echo $value;?>%</h2>
                       </div>
                      
                     <div class="pricing-content">
                       <div class="pricing-table-list">
                            <ul class="list-unstyled">
                                <li> <i class="fa fa-check"></i>Nr. Voters: <?php echo $voterkand;?></li>
                               
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
        <a class="button border white" href="logout.php">
          <span>Log Out </span>
          <i class="fa fa-lock"></i>
       </a> 
    </div>
  </div>
 </div>
</section>
 
<!--=================================
action box- <--> 
 
 

</div>
 
 

 
<!--=================================
 jquery -->

<!-- jquery -->
<script type="text/javascript" src=".../js/jquery-1.12.4.min.js"></script>

<!-- plugins-jquery -->
<script type="text/javascript" src="../js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '../js/';</script>
 

<!-- custom -->
<script type="text/javascript" src="../js/custom.js"></script>
 
</body>
</html>