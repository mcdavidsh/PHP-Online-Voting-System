<?php
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 2000)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();
//Site Info
$sitename = 'INEC';
$pageTitle =
    ucwords(str_replace(array('-', '/', '.php'), array(' '), basename($_SERVER['PHP_SELF']))).' | '.' '.$sitename;
$breadcrumb =
    ucwords(str_replace(array('-', '/', '.php'), array(' '), basename($_SERVER['PHP_SELF'])));
$favico ='library/assets/home/img/page/default/favico.png';
$favico_app ='../../library/assets/home/img/page/default/favico.png';

//Default Home
$sitelogo = '<img src="library/assets/home/img/page/default/logo.png" class="vt-logo"> ';

//App Panel
$sitelogo_app = '<img src="../../library/assets/home/img/page/default/logo.png" class="vt-logo"> ';
$user_avatar ='../../library/assets/app/assets/images/pages/voter/avatar.png';
//Notification



//Home Links
$homepage = 'index.php';
$preloader = '<div id="loader" class="loader">
    <div class="plane-container">
        <div class="l-s-2 blink">LOADING.....</div>
    </div>
</div>';
$voterlogin = 'login.php';
$voterreg = 'register.php';
$voterrecovery = 'forgot-password.php';
$about ='about.php';
$report ='contact.php';
$blog ='blog.php';

//Voter Links
$vtlogin = isset($_SESSION['vtlogin']);
$dash = 'dashboard.php';
$vote ='vote.php';
$profile ='profile.php';
$status_comp ='status.php';
$exit ='logout.php';

//Contestant Links
$ctlogin = isset($_SESSION['ctlogin']);
$cetlogin = 'login.php';
$cetreg = 'app/contestant/register.php';
$contest = 'contest.php';
$electresult = 'result.php';
$votebo ='vote-booth.php';
$votedet ='vote-details.php';
//Admin Links
$adlogin = isset($_SESSION['adlogin']);
$contestcat = 'contest-category.php';
$electionst = 'election.php';
$partycat = 'party.php';
$news = 'news.php';
$adminprofile = 'admin.php';
$contestprofile = 'contestants.php';
$votersprofile = 'voters.php';
$votes = 'votes.php';
$settings = 'settings.php';





?>
