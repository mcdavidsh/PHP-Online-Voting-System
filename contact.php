<?php
include "library/config/dbconn.php";
include "library/config/constants.php";

$your_email = "david@softhood.net";

use PHPMailer\PHPMailer\PHPMailer;
require('library/assets/home/phpMailer/PHPMailer.php');
require('library/assets/home/phpMailer/SMTP.php');
require('library/assets/home/phpMailer/Exception.php');
$mail = new PHPMailer();



if (!empty($_POST)) {


   // For Using SMTP uncomment following and add your Server settings

      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'david@softhood.net';                 // SMTP username
      $mail->Password = 'unlimited181994';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;


    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($your_email);

    //Content
    $mail->isHTML(true);        // Set email format to HTML

    $mail->Subject = !empty($_POST['subject']) ? $_POST['subject'] : 'Message From Contact Form';

    $mail->Body  = !empty($_POST['name']) ? 'Name: '.$_POST['name'] .'<br>' : '';
    $mail->Body .= !empty($_POST['subject']) ? 'Subject: '.$_POST['subject'] .'<br>' : '';
    $mail->Body .= !empty($_POST['company']) ? 'Company: '.$_POST['company'] .'<br>' : '';
    $mail->Body .= !empty($_POST['phone']) ? 'Phone: '.$_POST['phone'] .'<br>' : '';
    $mail->Body .= 'Message:<br>';
    $mail->Body .= $_POST['message'];

    if (!$mail->Send()) {
        $errormsg = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> Email Not Sent $mail->ErrorInfo</div>";
    } else {
        $successmsg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> Email Sent Successfully</div>";
    }
}

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
<!-- Header -->
<nav class="mainnav navbar navbar-default justify-content-between">
    <div class="container relative">
        <a class="offcanvas dl-trigger paper-nav-toggle text-white" type="button" data-toggle="offcanvas"
           aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="color: #ffffff;">
            <i class="text-white"></i>
        </a>
        <a class="navbar-brand text-white text-center d-block align-top" href=" <?php echo $homepage ?>">
            <?php echo $sitelogo ?>
            <!--               <span class="h2 ml-1">INEC</span>-->
        </a>
        <div class="paper_menu ">
            <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                <ul class="dl-menu">

                    <li class="text-success"><a href="app/index.php" class="py-2 btn btn-success btn-block"><span
                                    class="text-white">Login</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href=" <?php echo $homepage ?>" class="text-success">Home</a></li>
            <li class="active">Contact</li>
        </ol>
    </div>
</div>
<div class="page">
    <div class="content-wrapper animatedParent animateOnce">
        <div class="container">
            <div class="contact-us-info p-t-b-40">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="p-t-b-20">
                            <div class="widget widget-address">
                                <h3>Contact Info</h3>
                                <div class="p-t-b-20"><strong>Name:</strong>
                                    <p>Softhood Limited</p>
                                    <strong> Email : </strong>
                                    <p>contact@softhood.net</p> <strong>Call/Whatsapp: </strong>
                                    <p>+2349034787969</p>
                                    <a href="https://blockchain.com/btc/payment_request?address=1Jwz6V8tAL7UfwoAN2AAYE9tS8dMbWWhfq&amount=0.00052530&message=Donation" class="btn btn-success text-white"><i class="icon icon-money"> Donate</i></a>
                                </div>

                            </div>
                            <ul class="social">
                                <li class="facebook"><a href="https://www.facebook.com/softhoodcorp/"><i
                                                class="icon icon-facebook"></i></a>
                                </li>

                                <li class="twitter"><a href="https://twitter.com/softhoodcorp"><i
                                                class="icon icon-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xl-6 col-lg-12 col-12 ">
                        <div class="contactFormWrapper ">
                            <?php
                            if (isset($successmsg)) {
                                echo $successmsg;
                            }
                            unset($successmsg);
                            ?>
                            <?php
                            if (isset($errormsg)) {
                                echo $errormsg;
                            }
                            unset($errormsg);
                            ?>
                            <form method="post" novalidate>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label for="name">Name</label>
                                        <input type="text"
                                               class="form-control"
                                               id="name"
                                               name="name"
                                               placeholder=""
                                               required>
                                        <div class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="subject" class="required">Subject</label>
                                        <input type="text"
                                               class="form-control"
                                               id="subject"
                                               name="subject"
                                               placeholder=""
                                               required>
                                        <div class="invalid-feedback">
                                            Please enter subject.
                                        </div>
                                    </div>
                                    <!--                                    <div class="col-12">-->
                                    <!--                                        <label for="company">Company Name</label>-->
                                    <!--                                        <input type="text"-->
                                    <!--                                               class="form-control"-->
                                    <!--                                               id="company"-->
                                    <!--                                               placeholder="">-->
                                    <!--                                    </div>-->
                                    <div class="col-12 col-lg-6">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email"
                                               class="form-control"
                                               id="email"
                                               name="email"
                                               placeholder=""
                                               required>
                                        <div class="invalid-feedback">
                                            Please enter email.
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="phone" class="required">Tel/Mob</label>
                                        <input class="form-control" type="text"
                                               name="phone" id="phone">
                                    </div>
                                </div>
                                <label for="message" class="required">Message</label>
                                <textarea
                                          name="message"
                                          id="message"
                                          class="form-control"
                                          required rows="9">
                                </textarea>
                                <div class="invalid-feedback">
                                    Please enter message.
                                </div>
                                <div class="text-right p-t-20">
                                    <button class="btn btn-success btn-lg"><i class="icon icon-envelope-o"></i> Send
                                        Message
                                    </button>
                                </div>
                            </form>
                            <div class="p-t-b-20">
                                <div id="valid-issue" class="alert" style="display:none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!--End Page page_wrrapper -->
<?php include "library/include/home/footer.php"; ?>

</body>
</html>
