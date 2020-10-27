<?php header("Content-type: text/html; charset=iso-8859-1"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SGCOPEX - Sistema de Gerenciamento da COPEX</title>

    <link href="../View/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../View/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../View/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../View/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../View/assets/lineicons/style.css">    
    <link href="../View/assets/css/style.css" rel="stylesheet">
    <link href="../View/assets/css/style-responsive.css" rel="stylesheet">

    <script src="../View/assets/sweetalert/sweetalert.min.js"></script>
    <script src="../View/assets/js/chart-master/Chart.js"></script>
    <script src="../View/assets/js/script.js"></script>
</head>

<body>
    <section id="container" >
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="index.html" class="logo"><b>SGCOPEX</b></a>
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    <h5 class="centered">Marcel Newman</h5>
                    <li class="mt">
                        <a class="active" href="index.html">
                            <span class="li_user"></span>
                            <span> Pessoa</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                                <span class="li_note"></span>  
                                <span> Edital</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <span class="li_bulb"></span>
                            <span> Projeto</span>
                        </a>
                    </li>                  
                </ul>
            </div>
        </aside>
      
        