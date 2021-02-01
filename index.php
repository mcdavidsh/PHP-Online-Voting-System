<?php
include "library/config/dbconn.php";
include "library/config/constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo "<title>$sitename - Your Vote Counts</title>";
    include "library/include/home/header.php";
    ?>
</head>
<body>
<!-- Pre loader-->
<?php echo $preloader; ?>

<div class="nav-absolute nav-fixed">
    <!-- Header -->
    <nav class="mainnav navbar navbar-default justify-content-between">
        <div class="container relative">
            <a class="offcanvas dl-trigger paper-nav-toggle text-white" type="button" data-toggle="offcanvas"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="color: #ffffff;">
                <i class="text-white"></i>
            </a>
           <a class="navbar-brand text-white text-center d-block align-top" href="index.php">
              <?php echo $sitelogo?>
<!--               <span class="h2 ml-1">INEC</span>-->
           </a>
           <div class="paper_menu ">
               <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                   <ul class="dl-menu">

                       <li class="text-success"><a href="app/index.php" class="py-2 btn btn-light btn-block"><span class="text-success">Login</span></a></li>
                   </ul>
               </div>
           </div>
       </div>
    </nav>
</div>
<!-- Hero -->
<section class="search-section product-head vt-banner">
    <div class="text-center p-t-b-40">
        <div class="container">
            <h1>Election in Nigeria is Now Digital</h1>
            <p>Encouraging Nigerians to Participate in Voting.</p>
        </div>
    </div>
</section>
<section class="contactBar vt-bar">
    <div class="container">
        <div class="row contacts shadow py-4">
            <div class="col-md-3 col-sm-12">
                <a href="<?php echo $voterlogin;?>" class="btn btn-success">VOTE</a>
            </div>
            <div class="col-md-2 home-link">
                <a href="<?php echo $blog;?>" class="text-capitalize">
                <i class="icon icon-newspaper"></i>
                News</a>
            </div>
            <div class="col-md-2 home-link">
                <a href="<?php echo $report;?>" class="text-capitalize">
                    <i class="icon icon-warning2"></i>
                    Report Fraud</a>
            </div>
            <div class="col-md-2 home-link"><a href="<?php echo $about;?>" class="text-capitalize">
                <i class="icon icon-info_outline"></i>
                About</a>
            </div>
            <div class="col-md-3 col-sm-12">
<!--                <a href="#" href="#" class="btn btn-success">REGISTER</a>-->
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        REGISTER
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo $voterreg;?>">Voter</a>
                        <a class="dropdown-item" href="<?php echo $cetreg;?>">Contestant</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "library/include/home/footer.php"?>
