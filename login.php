<?php

?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bali Dental Aesthetics</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--  <link href="assets/css/demo.css" rel="stylesheet" />-->
    <!--    Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<style>
.wrapper{
  background:#8564ce;
}
</style>
<body>

<div class="wrapper" data-color="purple" data-image="assets/img/sidebar-5.jpg" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20%;">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <div align="center"><br>
                          <div class="logo">
                              <a href="http://balidentalaesthetics.com/" class="simple-text" style="font-size:14px;">
                                  <img src="assets/img/logo.png" width="30"> Bali Dental <i>Aesthetics</i>
                              </a>
                          </div>
                        </div>
                </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="proses/login.php">
                            <fieldset>
                                <?php if(isset($_GET['wrong']))	{	?>
                                <div class="form-group" align="center" style="color:#EA0006;">
                                    <strong>You've enter incorrect Email / Password</strong>
                                </div>
                                <?php	}	?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nama" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!--<div class="form-group">
                                <a href="#">Forgot Password</a>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" name="login"  style="width:100%" class="btn btn-success">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<!--<script src="assets/js/demo.js"></script>-->

	<script type="text/javascript">
    	$(document).ready(function(){

    	$('#table1').DataTable({

			});

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
