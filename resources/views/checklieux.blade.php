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
                                 <li>
                                 <?php
                                    $privilege=CRUDBooster::Myprivilegeid();
                                        if($privilege)
                                        {

                                ?>
                                
                               
                                 <div class="pull-{{ trans('crudbooster.right') }}" >
                                 
                                    <a href ="../public/admin/users/profile">
                                        {{ CRUDBooster::myName() }}
                                    </a> &nbsp
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
          @if ($countreserv != 0)
          
    @foreach($reserv as $row )
    <div class="row"-->  
            <div class="col-md-7" style="margin-left:1%;">
            <h3>bienvenue au <b> {{ $row->Titre }} </b> </h3><!--code php affiche nom-->

                 <img src="{{ $row->Photo }}" alt="Image" class="img-fluid" style="margin-left:2%;height:200px;width:350px;">
                 <img src="{{ $row->photo2 }}" alt="Image" class="img-fluid" style="margin-left:2%;height:200px;width:350px;">
                 <br>
                 <img src="{{ $row->photo3 }}" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;height:200px;width:350px;">
                 <img src="{{ $row->photo4 }}" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;height:200px;width:350px;">
            </div>
            <div class="col-md-3" style="margin-top:3%;">
                <h4> <b> Voici Nos informatons </b> </h4>
                <hr>
                <p><b>Lieux</b>  &nbsp{{ $row->Titre }}</p>
                <p><b>Description</b>  &nbsp{{ $row->Description }}</p>
                <p><b>Prix</b>  &nbsp{{ $row->Prix}}</p>
                <p><b>Nombre De Place</b>  &nbsp{{ $row->NbrPlaces}}</p>
                <p><b>Difficulté</b>  &nbsp{{ $row->Difficulte}}</p>
                <p><b>Date De Debut</b>  &nbsp{{ $row->DateDebut }}</p>
                <p><b>Date De Fin </b>  &nbsp{{ $row->DateFin }}</p>
                <a href="guide?id={{ $row->Guide}}" class="btn btn-success"><b>Voir Votre Guide</b></a>
                <a href="reservation?id_guide={{ $row->Guide}}&id_lieux={{ $row->id}}&prix={{ $row->Prix}}&nbr_place_tot={{ $row->NbrPlaces}}&id_service=2&msg=0" class="btn btn-info"><b>Reserver</b></a>
                
            </div>
    </div>
    @endforeach
    @elseif ($countreserv==0) 
	<h3><span style="color:red;">Pas de reservation pour ce date</span></h3>
   @endif


    
    
     
    
    <!-- ***********************END div image et description SERVICES******************************-->


    <!-- ***********************START div image et description SERVICES******************************-->
    <!--div class="row">  
            <div class="col-md-7" style="margin-left:1%;">
            <h3>Vous etes le bienvenue chez</h3><!--code php affiche nom-->

                 <!--img src="uploads/1/2022-03/darbou.jpg" alt="Image" class="img-fluid" style="margin-left:2%;height:200px;width:350px;">
                 <img src="uploads/1/2022-03/darbou1.jpg" alt="Image" class="img-fluid" style="margin-left:2%;height:200px;width:350px;">
                 <br>
                 <img src="uploads/1/2022-03/darbou3.jpg" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;height:200px;width:350px;">
                 <img src="uploads/1/2022-03/darbou4.jpg" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;height:200px;width:350px;">
            </div>
            <div class="col-md-3" style="margin-top:3%;">
                <h4>Titre service</h4>
                <hr>
                <p>Description</p>
                <p>Contact</p>
            </div>
    </div>
    <!-- ***********************END div image et description SERVICES******************************-->
    <!--br>
    <hr>
    <div class="row">
        <div class="col-md-7" style="margin-left:1%;">
             <h4>Notre Menu</h4>
             <img src="uploads/1/2022-03/boumakhlouf.PNG" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;">
        </div>
    </div>
    <!-- ***********************START div image et description SERVICES******************************-->
    <!--br>
    <div class="row">  
            <div class="col-md-7" style="margin-left:1%;">
            <h3>Vous etes le bienvenue chez</h3><!--code php affiche nom-->

                 <!--img src="uploads/1/2022-03/dar_fatima4.jpg" alt="Image" class="img-fluid" style="margin-left:2%;height:200px;width:350px;">
                 <img src="uploads/1/2022-03/dar_fatima2.jpg" alt="Image" class="img-fluid" style="margin-left:2%;height:200px;width:350px;">
                 <br>
                 <img src="uploads/1/2022-03/dar_fatima1.jpg" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;height:200px;width:350px;">
                 <img src="uploads/1/2022-03/dar_fatima.jpg" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;height:200px;width:350px;">
            </div>
            <div class="col-md-3" style="margin-top:3%;">
                <h4>Titre service</h4>
                <hr>
                <p>Description</p>
                <p>Contact</p>
            </div>
    </div>
    <br>
    
    <!-- ***********************END div image et description SERVICES******************************-->
    <!--br>
    <hr>
    <div class="row">
        <div class="col-md-7" style="margin-left:1%;">
             <h4>Notre Menu</h4>
             <img src="uploads/1/2022-03/fatima.PNG" alt="Image" class="img-fluid" style="margin-left:2%;margin-top:2%;">
        </div>
    </div>


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
