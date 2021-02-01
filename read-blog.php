<?php
error_reporting(E_ALL);
session_start();
include "library/config/dbconn.php";
include "library/config/constants.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo "<title>$pageTitle</title>";
    include "library/include/home/header.php";
    ?>
</head>
<body>
<!-- Pre loader -->
<?php echo $preloader; ?>
<main class="single single-knowledgebase">
    <!-- Header -->
    <nav class="mainnav navbar navbar-default justify-content-between">
        <div class="container relative">
            <a class="offcanvas dl-trigger paper-nav-toggle text-white" type="button" data-toggle="offcanvas"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="color: #ffffff;">
                <i class="text-white"></i>
            </a>
            <a class="navbar-brand text-white text-center d-block align-top" href=" <?php echo $homepage?>">
                <?php echo $sitelogo?>
                <!--               <span class="h2 ml-1">INEC</span>-->
            </a>
            <div class="paper_menu ">
                <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                    <ul class="dl-menu">

                        <li class="text-success"><a href="app/index.php" class="py-2 btn btn-success btn-block"><span class="text-white">Login</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <?php
        $id=intval($_GET['id']);
        $query = mysqli_query($con, "select * from news where id = '$id'");
        $row = mysqli_fetch_array($query);
        ?>
        <div class="container">
            <ol>
                <li><a href="<?php echo $homepage ?>">Home</a>
                </li>
                <li><a href="<?php echo $blog?>">News</a>
                </li>
                <li class="active"> <?php echo $row['title'] ;?></li>
            </ol>
        </div>
    </div>
    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="container">

            <div class="col-lg-10 mx-md-auto ">
                <article class="post">
                    <h1><?php echo $row['title'];?></h1>
                    <ul class="meta">
                        <li><span>Created :</span> <?php echo $row['date'];?></li>
<!--                        <li><span>Last Updated:</span> April, 15, 2016</li>-->
                    </ul>
                    <div
                        class="text-center">
                        <img src="library/assets/app/uploads/<?php echo $row['image'];?>" alt="">
                    </div>
                    <p><?php echo $row['body'];?></p>

                </article>
            </div>
        </div>
    </div>
</main>


<?php include "library/include/home/footer.php"; ?>
</body>
</html>
