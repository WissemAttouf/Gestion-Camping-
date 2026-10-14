<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Camp Tunisie </title>
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
                                    <a class="nav-link active" href="#">Accueil <span class="sr-only">(current)</span></a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-3">Logements et retaurations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-4">Nous contacter</a>
                                  
                                </li>
                                <?php
                                    $privilege=CRUDBooster::Myprivilegeid();
                                    $id=CRUDBooster::Myid();
                                        if($privilege)
                                        {

                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="mes_reservations?id=<?php echo $id;?>">Mes reservations</a>
                                </li>
                                
                               <li>
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

        <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">

                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title" ><span style="color:orange;">CAMP</span> <span style="color:red;">TUNISIE</span></h1>
                                    <img src="img/dots-3.png" alt="Dots">
                                    <p class="tm-banner-subtitle">Nous vous aidons à choisir le meilleur.</p>
                                    <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>       
                                </div>    
                            </div>  <!-- col-xs-12 -->                      
                        </div> <!-- row -->
                        <div class="row tm-banner-row" id="tm-section-search">

                            
                            
                            <form action="checklieux" method="get" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">                                
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="inputCity">Destination</label>
                                        <input name="destination" type="text" class="form-control" id="inputCity" placeholder="Chercher par ville... " >
                                    </div>
                                    
                                </div> <!-- form-row -->
                                <div class="form-row tm-search-form-row">

                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                        <label for="inputCheckIn">Date de début</label>
                                        <input name="depart" type="date" class="form-control" id="inputCheckInb" placeholder="Check In">
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                        <label for="inputCheckOut">Date de Fin</label>
                                        <input name="check-out" type="date" class="form-control" id="inputCheckOut" placeholder="Check Out">
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="btnSubmit">&nbsp;</label>
                                        <button type="submit" class="btn btn-success tm-btn tm-btn-search text-uppercase" id="btnSubmit">Voir les disponibilités</button>
                                    </div>
                                </div>                              
                            </form>                             

                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div>  <!-- .container -->                   
                </div>     <!-- .tm-container-outer -->                 
            </section>

            <section class="p-5 tm-container-outer tm-bg-gray">            
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                            <h2 class="text-uppercase mb-4">Votre <strong>Plaisir</strong> est notre priorité</h2>
                            <p> <strong>Rien ne développe l’intelligence comme les voyages.</strong> </p>
                            <a href="#" class="text-uppercase btn-primary tm-btn">Continuer à explorer</a>                              
                        </div>
                    </div>
                </div>            
            </section>
            
            <div class="tm-container-outer" id="tm-section-2">
                <section class="tm-slideshow-section">
                    @foreach ($lieux as $main)
                    <div class="tm-slideshow">
                     

                        <img src={{ $main->Photo }} >
                            
                    </div>
                    <div class="tm-slideshow-description tm-bg-primary">
                        <h2 class="">{{ $main->Titre }}</h2>
                        <p>{{ $main->Description }}</p>
                        <a href="lieux?id={{ $main->id }}" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Details</a>
                    </div>
                    @endforeach
                </section>
                <br>
                
                
                <section class="tm-slideshow-section">
                 @foreach ($guide as $main)
                    <div class="tm-slideshow">
                        <img src={{ $main->photo }}  style="height:350px;width:350px;">                        
                    </div>
                    <div class="tm-slideshow-description tm-bg-primary">
                        <h2 class="">{{ $main->nom }}</h2>
                        <p>{{ $main->prenom  }}</p>
                        <a href="guide?id={{ $main->id }}" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Continue </a>
                    </div>
                    @endforeach
                </section>
                
            </div>        
            <div class="tm-container-outer" id="tm-section-3" style="margin-top:2%;">
              
                <div class="tab-content clearfix">
                	
                    
                     
                    <!-- Tab 2 -->
                    <div class="tab-pane fade" id="1a">

                        <div class="tm-recommended-place-wrap">
                            @foreach($services as $row)
                            <div class="tm-recommended-place">
                                <img src={{ $row->photo1 }} " class="img-fluid tm-recommended-img">
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">{{ $row->titre }}</h3>
                                    <p class="tm-text-highlight">{{ $row->lieux }}</p>
                                    <p class="tm-text-gray">{{ $row->description }}</p>   
                                </div>
                                <a href="services" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">500</p>
                                    <p class="tm-recommended-price-link">Details</p>
                                </a>                        
                            </div>
                            @endforeach 

                              
                        </div>                        

                        
                    </div> <!-- tab-pane -->          
                    
                    <!-- Tab 4 -->
                    <div class="tab-pane fade show active" id="4a">
                    <!-- Current Active Tab WITH "show active" classes in DIV tag -->
                        <div class="tm-recommended-place-wrap">
                            @foreach($services as $main)
                            <div class="tm-recommended-place">
                                <img src={{ $main->photo1 }} alt="{{ $main->titre }}" class="img-fluid tm-recommended-img">
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">{{ $main->titre }}</h3>
                                    <p class="tm-text-highlight">{{ $main->lieux }}</p>
                                    <p class="tm-text-gray">{{ $main->description }}</p>   
                                </div>
                                <a href="services?id={{ $main->id }}" class="tm-recommended-price-box">
                                    
                                    <p class="tm-recommended-price-link">Details</p>
                                </a>                        
                            </div>
                            @endforeach

                              </a>
                            </div>

                                                  

                               
                      



            <footer class="tm-container-outer">
                <p class="mb-0">Copyright © <span class="tm-current-year">2022</span> CAMP TUNISIE 
                    
                . Designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a></p>
            </footer>
        </div>
    </div> <!-- .main-content -->

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
