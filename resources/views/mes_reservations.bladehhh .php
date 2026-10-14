<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CAMP TUNISIE</title>
<!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      </head>

      <body>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>    
            <div class="tm-top-bar" id="tm-top-bar">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a class="navbar-brand mr-auto" href="#">
                                <img src="img/logo.png" alt="Site logo">
                                 <span style="color:orange;">CAMP</span> <span style="color:red;">TUNISIE</span>
                            </a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                                    <a class="nav-link active" href="#top">Accueil <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-3">Logements et retaurations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-4">Nous contacter</a>
                                </li>
                                 <?php
                                    $privilege=CRUDBooster::Myprivilegeid();
                                        if($privilege)
                                        {

                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="mes_reservations">Mes reservations</a>
                                  
                                </li>
                               <li>
                                 <div class="pull-{{ trans('crudbooster.right') }}" >
                                 
                                    <span>
                                        {{ CRUDBooster::myName() }}
                                    </span> &nbsp
                                <a href="{{ route("getLogout") }}" class="btn btn-danger btn-flat"><i class='fa fa-power-off'></i></a>
                            </div>
                            </li>
                                <?php
                                     }
                                     else
                                     {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/login">Se connecter</a>
                                  
                                </li>
                                <?php

                                     }
                                ?>
                            </ul>
                        </div>                            
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->
          <!-- ***********************START div image et description SERVICES******************************-->    
    <div class="row">  
            <div class="col-md-7" style="margin-left:1%;">
                <table class="table">
                    <thead>
                        <th>Id Lieux</th>
                        <th>Date de reservation</th>
                        <th>Nbr des places réservées</th>
                        <th>Prix de reservation</th>
                        <th>Etat de reservation</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($reserv as $row )
                        <tr>
                            <td>{{ $row->idlieux }}</td>
                            <td>{{ $row->datereservation }}</td>
                            <td>{{ $row->nbreplacereserve }}</td>
                            <td>{{ $row->payement }}</td>
                            <td>{{ $row->etat }}</td>
                            <td><a href="#">Annuller</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    
    
    
     
    
    <!-- ***********************END div image et description SERVICES******************************-->



    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->       
    <script src="js/bootstrap.min.js"></script>                 <!-- https://getbootstrap.com/ -->
    <script src="js/datepicker.min.js"></script>                <!-- https://github.com/qodesmith/datepicker -->
    <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
    <script src="js/jquery.scrollTo.min.js"></script>           <!-- https://github.com/flesler/jquery.scrollTo -->
    <script> 
        /* Google Maps
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(37.769725, -122.462154),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
              calculateCenter();
          });

            google.maps.event.addDomListener(window, 'resize', function() {
              map.setCenter(center);
          });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap(){
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        } 

        /* DOM is ready
        ------------------------------------------------*/
        $(function(){

            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {                    
                 $(".tm-top-bar").removeClass("active");
                }
            });

            // Smooth scroll to search form
            $('.tm-down-arrow-link').click(function(){
                $.scrollTo('#tm-section-search', 300, {easing:'linear'});
            });

            // Date Picker in Search form
            var pickerCheckIn = datepicker('#inputCheckIn');
            var pickerCheckOut = datepicker('#inputCheckOut');

            // Update nav links on scroll
            $('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 60
            });

            // Close navbar after clicked
            $('.nav-link').click(function(){
                $('#mainNav').removeClass('show');
            });

            // Slick Carousel
            $('.tm-slideshow').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });

            loadGoogleMap();                                       // Google Map                
            $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright           
        });

    </script>             

</body>
</html>
