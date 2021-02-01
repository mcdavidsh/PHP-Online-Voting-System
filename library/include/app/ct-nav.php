<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="<?php echo $dash; ?>"><?php echo $sitelogo_app;?></a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>

<!--    Loader Begins-->
    <?php
    $status =1;
    $query=  "select * from contestant where profile=$status and email='".$_SESSION['ctlogin']."'";
    $result =mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <?php
    if($row['profile']== 0 or $row['profile']=="" )
    {
echo '
 <div class="card-body __loading">
            <div class="loader-container text-center">
                <div class="icon">
                    <div class="sk-wave">
                        <div class="sk-rect sk-rect1"></div>
                        <div class="sk-rect sk-rect2"></div>
                        <div class="sk-rect sk-rect3"></div>
                        <div class="sk-rect sk-rect4"></div>
                        <div class="sk-rect sk-rect5"></div>
                    </div>
                </div>
                <div class="title">Processing</div>
            </div>
            <div class="text-indent">'
         ?>
<!--Loader Body-->

    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="<?php echo ($_SERVER['PHP_SELF'] == $dash ? "active" : "");?>">
                <a href="<?php echo $dash;?>">
                    <div class="icon">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="title">Dashboard</div>
                </a>
            </li>
            <li class="@@menu.messaging">
                <a href="<?php echo $vote;?>">
                    <div class="icon">
                        <i class="fa fa-inbox" aria-hidden="true"></i>
                    </div>
                    <div class="title">Vote</div>
                </a>
            </li>
            <li class="@@menu.messaging">
                <a href="<?php echo $profile;?>">
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="title">Account</div>
                </a>
            </li>
            <li class="@@menu.messaging">
                <a href="<?php echo $exit;?>">
                    <div class="icon">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                    </div>
                    <div class="title">Exit</div>
                </a>
            </li>
        </ul>
    </div>
<!--   Loader Ends -->
        <?php echo  ' </div>
 </div>';
    }

    else {
    ?>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="<?php if (basename($_SERVER['PHP_SELF'])==$dash) echo 'active';?>">
                    <a href="<?php echo $dash;?>">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li class="dropdown <?php if (basename($_SERVER['PHP_SELF'])==$contest|| basename($_SERVER['PHP_SELF'])==$electresult ) echo 'active';?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-inbox" aria-hidden="true"></i>
                        </div>
                        <div class="title">Election</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section"><i class="fa fa-gears" aria-hidden="true"></i>Manage Election</li>
                            <li><a href="<?php echo $contest;?>">Contest</a></li>
                            <li><a href="<?php echo $electresult;?>">Result</a></li>
                        </ul>
                    </div>
                </li>
                <li class="<?php if (basename($_SERVER['PHP_SELF'])==$profile) echo 'active';?>">
                    <a href="<?php echo $profile;?>">
                        <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="title">Account</div>
                    </a>

                </li>
                <li class="<?php if (basename($_SERVER['PHP_SELF'])==$exit) echo 'active';?>">
                    <a href="<?php echo $exit;?>">
                        <div class="icon">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                        </div>
                        <div class="title">Exit</div>
                    </a>
                </li>
            </ul>
        </div>

    <?php }?>

    <footer class="app-footer text-center">
        <div class="row">
            <div class="col-xs-12">
                <div class="footer-copyright">&copy; <?php echo $sitename .' '.date('Y') ;?> - <a href="https://blockchain.com/btc/payment_request?address=1Jwz6V8tAL7UfwoAN2AAYE9tS8dMbWWhfq&amount=0.00052530&message=Donation" target="_parent" autofocus rel="license">Softhood</a>
                </div>
            </div>
        </div>
    </footer>
</aside>

