<!DOCTYPE html>

<?php 
  include("controllers/admin_cSqlConnect.php");
?>

<html lang="en">
<head>

<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Title-->
<title>DS | Portal </title>
<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/logo.png">

<!-- CSS Stylesheet-->

<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="assets/css/dsStudentsStyles.css" />
<link type="text/css" rel="stylesheet" href="assets/css/style2.css" />


<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="assets/css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="assets/css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="assets/css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="assets/css/styleTheme4.css" />

</head>
<body class="leftMenu nav-collapse">
<div id="wrapper">
    

    <!--
    ///////////////////////////////////////////////////////////////////////
    //////////     HEADER  CONTENT                         ///////////////
    //////////////////////////////////////////////////////////////////////
    -->
    <div id="header">
    
        <div class="logo-area clearfix">
            <a href="#" class="logo"></a>
        </div>
        <!-- //logo-area-->
        
        <div class="tools-bar">
            <ul class="nav navbar-nav nav-main-xs">
                <li><a href="#" class="icon-toolsbar nav-mini"><i class="fa fa-bars"></i></a></li>

                <li><button class="btn btn-circle btn-header-search" ><i class="fa fa-search"></i></button></li>
            </ul>
            
                
              
            </ul>
            <ul class="nav navbar-nav navbar-right tooltip-area">
                               
                <li><a class="avatar-header">
                        <img alt="" src="assets/img/admin.png"  class="circle">
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                      <em> ADMIN </em> <i class="dropdown-icon fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right icon-right arrow">
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Setting </a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Signout </a></li>
                    </ul>
                    <!-- //dropdown-menu-->
                </li>
                <li class="visible-lg">
                  <a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body"  data-placement="left">
                    <i class="fa fa-expand"></i>
                  </a>
                </li>
            </ul>
        </div>
        <!-- //tools-bar-->
        
    </div>
    <!-- //header-->
    


  
    <!--
    //////////////////////////////////////////////////////////////////////
    //////////     TOP SEARCH CONTENT                              ///////
    //////////////////////////////////////////////////////////////////////
    -->
    <div class="widget-top-search">
      <span class="icon"><a href="#" class="close-header-search"><i class="fa fa-times"></i></a></span>
      <form id="top-search">
          <h2><strong>Quick</strong> Search</h2>
          <div class="input-group">
              <input  type="text" name="q" placeholder="Find something..." class="form-control" />
              <span class="input-group-btn">
              <button class="btn" type="button" title="With Sound"><i class="fa fa-microphone"></i></button>
              <button class="btn" type="button" title="Visual Keyboard"><i class="fa fa-keyboard-o"></i></button>
              <button class="btn" type="button" title="Advance Search"><i class="fa fa-th"></i></button>
              </span>
          </div>
      </form>
    </div>
    <!-- //widget-top-search-->


    <!--
    //////////////////////////////////////////////////////////////
    //////////     LEFT NAV MENU                        //////////
    //////////////////////////////////////////////////////////////
    -->
    <!--<nav id="menu" data-search = "closed">-->
    <nav id="menu"  >
        <ul>  
            <li><a href="admin_vDashboard.php">
                <span><i class="icon  fa fa-laptop"></i> Dashboard</span>
            </a></li>
            
            <li><span><i class="icon  fa fa-user"></i> DS Community</span>
                <ul>
                    <li><a href="admin_vDsOfficers.php"> DS Officers </a></li>
                    <li><a href="admin_vDsStudent.php"> DS Students </a></li>
                    <li><a href="admin_vDsTeachers.php"> DS Teachers</a></li>
                    
                </ul>
            </li>
            <li><span><i class="icon  fa fa-bullhorn"></i> Activities </span>
                <ul>
                    <li><a href="admin_vCESActivities.php"> CES Activities</a></li>
                    <li><a href="admin_vTutorials.php"> DS Tutorials</a></li> 
                    <li><a href="admin_vStudentRegistration.php"> Student Registration</a></li>               
                </ul>
            </li>
            
             <li><a href="admin_vMemFeeList.php"><i class="icon  fa fa-money"></i> Membership Fee </a></li>

            <li><a href="admin_vRooms.php"><i class="icon  fa fa-map-marker"></i> Rooms </a></li>
            <li><a href="admin_vSubjects.php"><i class="icon  fa fa-book"></i> Subjects </a></li>

            <li><a href="admin_vCalendar.php"><i class="icon  fa fa-calendar"></i> Calendar </a></li>
        
            
        
            
            <li><a href="admin_vSiteMap.php"><i class="icon  fa fa-sitemap"></i>Site Map</a></li>
        </ul>
    </nav>
    <!-- //nav left menu-->
    