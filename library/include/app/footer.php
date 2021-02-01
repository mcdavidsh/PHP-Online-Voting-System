
</div>

</div>

<script type="text/javascript" src="../../library/assets/app/assets/js/vendor.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/js/app.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/bootstrap/popper.min.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/js/multi-file.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/image-uploader/script.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="../../library/assets/app/assets/js/marquee.js"></script>
<script src="notification/script.js"></script>

<script>



    //shwpassword
    function shPwd() {
        var x = document.getElementById("shpwd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
//    Tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('.carousel').carousel({
        interval: 2000
    })
//    Form Resubmission
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }



</script>

</body>
</html>
