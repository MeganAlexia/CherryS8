<?php
$session = session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <!-- Validation engine -->

        <link rel="stylesheet" href="../posabsolute-jQuery-Validation-Engine-499f567/css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="../posabsolute-jQuery-Validation-Engine-499f567/css/template.css" type="text/css"/>
        <script src="../posabsolute-jQuery-Validation-Engine-499f567/js/jquery-1.8.2.min.js" type="text/javascript">
        </script>
        <script src="../posabsolute-jQuery-Validation-Engine-499f567/js/languages/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="../posabsolute-jQuery-Validation-Engine-499f567/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
        <!--<script>
            jQuery(document).ready(function () {
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
        </script>-->


        <!-- Bootstrap CSS -->    
        <link href="../bootstrap/Nice-admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- bootstrap theme -->
        <link href="../bootstrap/Nice-admin/css/bootstrap-theme.css" rel="stylesheet">

        <!-- font icon -->
        <link href="../bootstrap/Nice-admin/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../bootstrap/Nice-admin/css/font-awesome.min.css" rel="stylesheet" />    

        <!-- full calendar css-->
        <link href="../bootstrap/Nice-admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../bootstrap/Nice-admin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />

        <!-- easy pie chart-->
        <link href="../bootstrap/Nice-admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

        <!-- owl carousel -->
        <link rel="stylesheet" href="../bootstrap/Nice-admin/css/owl.carousel.css" type="text/css">
        <link href="../bootstrap/Nice-admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

        <!-- Custom styles -->
        <link rel="stylesheet" href="../bootstrap/Nice-admin/css/fullcalendar.css">
        <link href="../bootstrap/Nice-admin/css/widgets.css" rel="stylesheet">
        <link href="../bootstrap/Nice-admin/css/style.css" rel="stylesheet">
        <link href="../bootstrap/Nice-admin/css/style-responsive.css" rel="stylesheet" />
        <link href="../bootstrap/Nice-admin/css/xcharts.min.css" rel=" stylesheet">	
        <link href="../bootstrap/Nice-admin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">

        <!-- Full calendar sources -->        
        <style>
            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }

            #calendar {
                max-width: 900px;
                margin: 50px auto;
            }
        </style>
        <script>
            $(document).ready(function () {

                function updateEvent(event, dayDelta, minuteDelta, allDay)
                {
                    $.ajax({'url': 'ajax.php?action=update', 'type': 'POST',
                        'data': {'id': event.id, 'dayDelta': dayDelta, 'minuteDelta': minuteDelta, 'allDay': allDay},
                        success: function (data) {
                            if (data.error)
                                alert(data.error);
                        },
                        error: function (data) {
                            alert('Une erreur est survenue.');
                        }
                    });
                }
            });

        </script>
        
        <!--CSS drag and drop-->
        <style>

            #drop-zone {
                /*Sort of important*/
                width: 100%;
                /*Sort of important*/
                height: 200px;
                position:absolute;
                left:0%;
                top:0px;
                margin-left:0;
                border: 2px dashed rgba(0,0,0,.3);
                border-radius: 20px;
                font-family: Arial;
                text-align: center;
                position: relative;
                line-height: 180px;
                font-size: 20px;
                color: rgba(0,0,0,.3);
            }

            #drop-zone input {
                /*Important*/
                position: absolute;
                /*Important*/
                cursor: pointer;
                left: 0px;
                top: 0px;
                /*Important This is only comment out for demonstration purpeses.
                opacity:0; */
            }

            /*Important*/
            #drop-zone.mouse-over {
                border: 2px dashed rgba(0,0,0,.5);
                color: rgba(0,0,0,.5);
            }


            /*If you dont want the button*/
            #clickHere {
                position: absolute;
                cursor: pointer;
                left: 50%;
                top: 50%;
                margin-left: -50px;
                margin-top: 20px;
                line-height: 26px;
                color: white;
                font-size: 12px;
                width: 100px;
                height: 26px;
                border-radius: 4px;
                background-color: #3b85c3;

            }

            #clickHere:hover {
                background-color: #4499DD;

            }

        </style>
    </head>

    <body>
        <?php
        // if the member is connected
        if (isset($_SESSION['email'])) {
            ?>
            <section id="container" class="">   
                <header class="header dark-bg">
                    <div class="toggle-nav">
                        <div class="icon reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
                    </div>
                    <a href="accueil_adultes.php" class="logo">Accueil</a>

                    <!--logo end-->
                    <div class="nav search-row" id="top_menu">

                        <!--search from start -->
                        <ul class="nav top-menu">
                            <li>
                                <form class="navbar-form" role="search" method="POST" action="index.php?page=recherche_result">
                                    <input type="text" name="recherche" class="form-control" placeholder="Je cherche...">
                                </form>
                            </li>
                        </ul>

                        <!--search form end -->
                    </div>


                    <div class="top-nav notification-row">                
                        <!-- notificatoin dropdown start-->
                        <ul class="nav pull-right top-menu">

                            <!-- task notificatoin start -->
                            <li id="task_notificatoin_bar" class="dropdown">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="profile-ava">
                                        <img alt="" height="15%" width="15%" src="user.png">
                                    </span>
                                    <span class="username"><b><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];    ?></b></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <div class="log-arrow-up"></div>
                                    <li class="eborder-top">
                                        <a href="accueil_adultes.php?page=profil"><i class="icon_profile"></i> Mon profil </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon_mail_alt"></i> Mes messages </a>
                                    </li>
                                    <li>
                                        <a href="accueil_adultes.php?page=file-manage"><i class="icon_chat_alt"></i> Mes fichiers </a>
                                    </li>
                                    <li>
                                        <a href="accueil_adultes.php?page=../handlers/logoutHandler"><i class="icon_key_alt"></i> Déconnexion </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- user login dropdown end -->
                            </li>
                            <!-- notificatoin dropdown end-->
                            <?php // } ?>
                        </ul>    
                    </div> 
                </header>


                <!--sidebar start -->
                <aside>
                    <div id="sidebar" class="nav-collapse">
                        <!--sidebar menu start-->
                        <ul class="sidebar-menu">
                            <li class="">   
                                <a class="" href="accueil_adultes.php?page=accueil_adultes">
                                    <i class="icon_house_alt"></i>
                                    <span>Accueil</span>
                                </a>
                            </li>
                            <?php
                            if (!isset($_SESSION['email'])) {
                                ?>

                                <?php
                            }
                            ?>

                            <li class="sub-menu">
                                <a class="" href="javascript:;">
                                    <i class="icon_document_alt"></i>
                                    <span>Que faire ?</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">  
                                    <li role="presentation"><a href="accueil_adultes.php?page=../handlers/calendar/calendar">Voir le calendrier</a></li> 
                                    <li role="presentation"><a href="accueil_adultes.php?page=add">Ajouter un fichier</a></li>
                                </ul>
                            </li>

                            <li class="">   
                                <a clas="" href="accueil_adultes.php?page=recherche">
                                    <i class="icon_documents_alt"></i>
                                    <span>Recherche</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- sidebar end -->

                <!-- main content start -->    
                <section id="main-content">
                    <section class="wrapper">
                        <?php
                        $page = @$_GET["page"];
                        if ($page == "")
                            $page = "accueil_adultes";

                        require_once ($page . ".php");
                        ?> 
                    </section> 
                </section>
            </section>
            <?php
            //if the member is not logged in
        } else
            echo "Vous devez vous connecter pour pouvoir accéder au contenu";
        ?>

        <!-- bootstrap -->
        <script src="../bootstrap/Nice-admin/js/bootstrap.min.js"></script>

        <!-- nice scroll -->
        <script src="../bootstrap/Nice-admin/js/jquery.scrollTo.min.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery.nicescroll.js" type="text/javascript"></script>

        <!-- charts scripts -->
        <script src="../bootstrap/Nice-admin/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="../bootstrap/Nice-admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="../bootstrap/Nice-admin/js/owl.carousel.js" ></script>

        <!-- jQuery full calendar -->
        <script src="../bootstrap/Nice-admin/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>

        <!--script for this page only-->
        <script src="../bootstrap/Nice-admin/js/calendar-custom.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery.rateit.min.js"></script>

        <!-- custom select -->
        <script src="../bootstrap/Nice-admin/js/jquery.customSelect.min.js" ></script>
        <script src="../bootstrap/Nice-admin/assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="../bootstrap/Nice-admin/js/scripts.js"></script>

        <!-- custom script for this page-->
        <script src="../bootstrap/Nice-admin/js/sparkline-chart.js"></script>
        <script src="../bootstrap/Nice-admin/js/easy-pie-chart.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../bootstrap/Nice-admin/js/xcharts.min.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery.autosize.min.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery.placeholder.min.js"></script>
        <script src="../bootstrap/Nice-admin/js/gdp-data.js"></script>	
        <script src="../bootstrap/Nice-admin/js/morris.min.js"></script>
        <script src="../bootstrap/Nice-admin/js/sparklines.js"></script>	
        <script src="../bootstrap/Nice-admin/js/charts.js"></script>
        <script src="../bootstrap/Nice-admin/js/jquery.slimscroll.min.js"></script>
        <script>

            //knob
            $(function () {
                $(".knob").knob({
                    'draw': function () {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function () {
                $("#owl-slider").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true
                });
            });

            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

            /* ---------- Map ---------- */
            $(function () {
                $('#map').vectorMap({
                    map: 'world_mill_en',
                    series: {
                        regions: [{
                                values: gdpData,
                                scale: ['#000', '#000'],
                                normalizeFunction: 'polynomial'
                            }]
                    },
                    backgroundColor: '#eef3f7',
                    onLabelShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>


    </body>
</html>