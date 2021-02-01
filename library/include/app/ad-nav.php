<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="<?php echo $dash; ?>"><?php echo $sitelogo_app;?></a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>

        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="<?php if (basename($_SERVER['PHP_SELF'])==$dash) echo 'active';?>">
                    <a href="<?php echo $dash;?>">
                        <div class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li class="dropdown <?php if (basename($_SERVER['PHP_SELF'])==$contestcat || basename($_SERVER['PHP_SELF'])==$partycat || basename($_SERVER['PHP_SELF'])==$electionst) echo 'active';?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">Election</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section"><i class="fa fa-gears" aria-hidden="true"></i>Manage Election</li>
                            <li><a href="<?php echo $contestcat;?>">Contest Category</a></li>
                            <li><a href="<?php echo $partycat;?>">Political Parties</a></li>
                            <li class="line"></li>
                            <li><a href="<?php echo $electionst;?>">Start Election</a></li>
                        </ul>
                    </div>
                </li>
                <li class=" <?php if (basename($_SERVER['PHP_SELF'])==$votes) echo 'active';?>">
<!--                    dropdown-->
                    <a href="<?php echo $votes;?>" >
<!--                        class="dropdown-toggle" data-toggle="dropdown"-->
                        <div class="icon">
                            <i class="fa fa-inbox" aria-hidden="true"></i>
                        </div>
                        <div class="title">Votes</div>
                    </a>
<!--                    <div class="dropdown-menu">-->
<!--                        <ul>-->
<!--                            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Manage Votes</li>-->
<!--                            <li><a href="">View Votes</a></li>-->
<!--<!--                            <li><a href="./uikits/components.html">Components</a></li>-->
<!--                            <li class="line"></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </li>
                <li class=" <?php if (basename($_SERVER['PHP_SELF'])==$news) echo 'active';?>">
                    <a href="<?php echo $news;?>">
                        <div class="icon">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        </div>
                        <div class="title">News</div>
                    </a>
<!--                    <div class="dropdown-menu">-->
<!--                        <ul>-->
<!--                            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Manage News</li>-->
<!--                            <li><a href="./uikits/customize.html">Create News</a></li>-->
<!--                            <li><a href="./uikits/components.html">Manage News</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </li>
                <li class="dropdown <?php if (basename($_SERVER['PHP_SELF'])==$votersprofile || basename($_SERVER['PHP_SELF'])==$contestprofile || basename($_SERVER['PHP_SELF'])==$adminprofile || basename($_SERVER['PHP_SELF'])==$settings) echo 'active';?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="title">Users</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section"><i class="fa fa-gears" aria-hidden="true"></i>Manage Users</li>
                            <li><a href="<?php echo $votersprofile;?>">Voters</a></li>
                            <li><a href="<?php echo $contestprofile;?>">Contestants</a></li>
                            <li><a href="<?php echo $adminprofile;?>">Administrators</a></li>
                            <li class="line"></li>
                            <li><a href="<?php echo $settings;?>">Settings</a></li>
                        </ul>
                    </div>
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


    <footer class="app-footer text-center">
        <div class="row">
            <div class="col-xs-12">
                <div class="footer-copyright">
                     &copy; <?php echo $sitename .' '.date('Y') ;?> - <a href="https://blockchain.com/btc/payment_request?address=1Jwz6V8tAL7UfwoAN2AAYE9tS8dMbWWhfq&amount=0.00052530&message=Donation" target="_parent" autofocus rel="license">Softhood</a>
                </div>
            </div>
        </div>
    </footer>
</aside>


