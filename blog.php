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
<div class="blog">
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
    <div class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href=" <?php echo $homepage?>" class="text-success">Home</a></li>
                <li class="active">News</li>
            </ol>
        </div>
    </div>
    <main class="content-wrapper">
        <div class="container">
            <header class="section-heading p-b-40">
                <h1 class="text-left">News</h1>
                <p class="text-left">This is News update</p>
            </header>
            <div class="row">
                <?php $query = mysqli_query($con, "select * from news");
                while ($row=mysqli_fetch_array($query)){
                ?>
                <div class="col-lg-3">
                    <article class="post"><span class="ico icon-document-text"></span>
                        <h2><a href="read-blog.php?id=<?php echo $row['id'];?>"></a><?php echo $row['title'];?></a></h2>
                        <a href="read-blog.php?id=<?php echo $row['id'];?>" style="color: #0ba360;">Read Article</a>
                    </article>
                </div>
                <?php } ?>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
</div>



<?php include "library/include/home/footer.php"; ?>

</body>
</html>
