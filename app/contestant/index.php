<?php
//silence is golden
session_start();
include "../../library/config/dbconn.php";
include "../../library/config/constants.php";

if (!$ctlogin){
    header("location:login.php");
}
else {
    header("location:dashboard.php");
}
