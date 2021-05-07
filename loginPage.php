<?php
    include ("controllers/admin_cSqlConnect.php"); 

    session_start();

    if(isset($_POST['log'])){
        $db = new mysqli("localhost", "root", "", "db_ds");

        if(!$db){
            header("location: loginPage.php");
        }else{
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $q = mysqli_query($db,"SELECT * FROM person");

            while($row = mysqli_fetch_array($q)){
                if($user == $row['person_schoolId'] && $pass == $row['person_password']){
                    $_SESSION['loginuser'] = $user;
                    $_SESSION['loginpass'] = $pass;
                    $_SESSION['student'] = $row['person_student'];
                    $_SESSION['officer'] = $row['person_officer'];
                    $_SESSION['teacher'] = $row['person_teacher'];
                    $_SESSION['Error'] = "Invalid username or password!";

                    header("location: login_try.php");
                }
            }   
        }
    }
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DS Portal</title>
    <link rel="shortcut icon" href="assets/ico/logo.png">">
    <!-- Bootstrap Core CSS -->
    <link href="studentAssets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="studentAssets/css/freelancer.css" rel="stylesheet">
     <link rel="stylesheet" href="studentAssets/styles.css">
 <link rel="stylesheet" href="studentAssets/css/style.css">

<style>
    body{
        background-image: url('studentAssets/img/home.png');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

</style>
</head>

<body id="page-top" class="index" >
<center>
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="studentAssets/img/studentPortal1.png" alt="DS Portal" width="500" height="150" class="navbar-brand" ></a>
            </div>


        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="studentAssets/img/ds.png" alt="" width = "600" hieght = "600">
                    
                    <button class="btn btn-primary btn-lg" id = "two">Sign In</button><br>
                    <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> 
                    <div class="intro-text">
                        <!--<span class="name">Start Bootstrap</span>-->
                    
                        <div class = "col-sm-6 col-sm-offset-3 top" style = "background-color: white; padding-top: 30px;">
                            <div class = "col-sm-10 col-sm-offset-1">
                            <h1 style = "color: #141c27;">SIGN IN</h1>
                            <br><br>

                            <form action="loginPage.php" method="POST">
                                <div class="group">
                                     <label style = "color: #141c27;">ID Number</label>
                                    <input type="text" name="user" style="color: black;" class = "form-control" required ><span class="highlight"></span><span class="bar"></span>
                                   
                                </div>
                                <div class="group">
                                    <label style = "color: #141c27;">Password</label>
                                    <input type="password" name="pass" style="color: black;" class = "form-control" required><span class="highlight">     
                                    </span><span class="bar"></span>
                                     
                                </div>
                                <br><br>
                                <input type="submit" value="Login" name="log" class="btn" style="background-color: #141c27;" >
                                <br><br>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </header>
</center>
  
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



    <script src="studentAssets/js/index.js"></script>

    <!-- jQuery -->
    <script src="studentAssets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="studentAssets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="studentAssets/js/jqBootstrapValidation.js"></script>
    <script src="studentAssets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="studentAssets/js/freelancer.min.js"></script>

</body>

</html>

<script src="studentAssets/js/jquery.min.js"> </script>
<script src="studentAssets/js/bootstrap.min.js"> </script>
<script>
$("document").ready(function(){
        $('#two').click(function(){
            $('html, body').animate({
                scrollTop: $(".top").offset().top
            }, 1000);
        });
     
    });
    
</script>
