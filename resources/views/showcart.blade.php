<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Campus Cafe - Smart Restaurant</title>

    <base href="/public">

    <!-- jquery cdn -->>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                       
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            <li class="scroll-to-section">

                                    @auth
                                        <a style="background-color:#3aac76; color:white; padding:2px"  href="{{url('showcart', Auth::id())}}">
                                            Cart[{{$count}}]
                                        </a>
                                    @endauth

                                    @guest
                                        <a href="/login">
                                            Cart[0]
                                        </a>
                                    @endguest

                            </li> 
                            <li>
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <li>
                                            <x-app-layout>
                                            </x-app-layout>
                                        </li>
                                    @else
                                       <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
                
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li>
                        </ul>     
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div id="top">

                <div >
                    <table align="center" magin="3px"  style="background: lightyellow;" >
                        <tr>
                            <th style="padding: 30px">Food Name</th>
                            <th style="padding: 30px">Price</th>
                            <th style="padding: 30px">Quantity</th>
                            <th style="padding: 30px">Action</th>
                        </tr>
                    @foreach ($items as $item)
                        <tr align="center">
                            <td>{{$item->title}}</td>
                            <td>${{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                        </tr>
                    @endforeach

                    @foreach ($cartitems as $cartitem)
                        <tr style="position: relative;">
                            <td>
                                <a class="btn btn-danger" href="{{url('removeitem', $cartitem->id)}}">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
    </div>

    <div align="center" style="padding:10px;">
        <button class="btn btn-primary" id="order">Order Now</button>
    </div>

    <div align="center" id="appear" style="padding:10px; display:none;">
        <div style="padding:10px;">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name">
        </div>

        <div style="padding:10px;">
            <label for="phone">Phone</label>
            <input type="text" name="phone" placeholder="Phone number">
        </div>

        <div style="padding:10px;">
            <label for="address">Address</label>
            <input type="text" name="address" placeholder="Enter your detail address">
        </div>

        
        <div style="padding:10px;">
            <input class="btn btn-success" type="submit" value="Confirm Order">
            <button id="close" class="btn btn-danger" >Cancel</button>
        </div>

    </div>

    <script>
        $("#order").click(
            function()
            {
                $("#appear").show();
            }
        );

        $("#close").click(
            function()
            {
                $("#appear").hide();
            }
        );
    </script>

     <!-- jQuery -->
     <script src="assets/js/jquery-2.1.0.min.js"></script>

     <!-- Bootstrap -->
     <script src="assets/js/popper.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
 
     <!-- Plugins -->
     <script src="assets/js/owl-carousel.js"></script>
     <script src="assets/js/accordions.js"></script>
     <script src="assets/js/datepicker.js"></script>
     <script src="assets/js/scrollreveal.min.js"></script>
     <script src="assets/js/waypoints.min.js"></script>
     <script src="assets/js/jquery.counterup.min.js"></script>
     <script src="assets/js/imgfix.min.js"></script> 
     <script src="assets/js/slick.js"></script> 
     <script src="assets/js/lightbox.js"></script> 
     <script src="assets/js/isotope.js"></script> 
     
     <!-- Global Init -->
     <script src="assets/js/custom.js"></script>
     <script>
 
         $(function() {
             var selectedClass = "";
             $("p").click(function(){
             selectedClass = $(this).attr("data-rel");
             $("#portfolio").fadeTo(50, 0.1);
                 $("#portfolio div").not("."+selectedClass).fadeOut();
             setTimeout(function() {
               $("."+selectedClass).fadeIn();
               $("#portfolio").fadeTo(50, 1);
             }, 500);
                 
             });
         });
 
     </script>
   </body>
 </html>