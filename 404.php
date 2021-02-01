<?php
error_reporting(E_ALL);

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
<body >
<!-- Pre loader -->
<?php echo $preloader; ?>


<main class="parallel">
    <div class="row grid">

        <div class="col-md-6 white">
            <div class="p-5">
                <div class="p-5">
                    <div class="text-center p-t-100">
                        <p class="s-128 bolder p-t-b-100">lost</p>
                        <p class="s-18">oh dear! you are lost don't try to hard.</p>
                        <div class="p-t-b-20"><a href="<?php echo $homepage; ?>" class="btn  btn-outline-primary btn-lg"><i
                                class="icon icon-arrow_back"></i> Go Back

                            To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 height-full" data-bg-repeat="false" data-bg-possition="center"
             style="background: url('library/assets/home/img/dummy/cs3.gif') #FFEFE4">
        </div>
    </div>
</main>



</div>
<!--End Page page_wrrapper -->
<script src="library/assets/home/js/app.js"></script>

</body>
</html>

