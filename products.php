<?php
session_start();

include('admin/connect.php'); 

$cat_id = $_GET['catid'];
$search_text = $_POST['search_text'];
$search_category = $_POST['search_category'];

$query = "select * from home_banners";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
               


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Venue - Responsive Web Template</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!--
	Venue Template
	http://www.templatemo.com/tm-522-venue
-->
</head>

<body>

    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.html">
                            <div class="logo">
                                <img src="img/logo.png" alt="Venue Logo">
                            </div>
                        </a>
                        <?php include('nav.php'); ?>
                    </div>
                </div>
            </div>
        </header>
    </div>









    <section class="featured-places" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Category -> <?php echo $search_text; ?></span>
                        <h2>Praesent nec dui sed urna</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php 
                 if($search_text)
                 {
                    
                    $products = "select * from products where title like '%$search_text%' and cat_id = '$search_category'";

                 }else{

                 $products = "select * from products where cat_id = $cat_id";
                 }


                 $result = mysqli_query($conn,$products);
                 $num = mysqli_num_rows($result);
                 for($i=0; $i<$num; $i++)
                 {
                 $row = mysqli_fetch_array($result);                 
                ?>


                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom:50px;">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="admin/<?php echo $row['image_1'];?>" alt="" style="height:350px;">
                            <div class="overlay-content">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="date-content">
                                <h6>28</h6>
                                <span>August</span>
                            </div>
                        </div>
                        <div class="down-content">
                            <h4><?php echo $row['title'];?></h4>
                            <span>Category One</span>

                            <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="product-details.php?product_id=<?php echo $row['id']; ?>">Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="#">N <?php echo number_format($row['price']);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>
        </div>
    </section>



    <section class="our-services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Our Services</span>
                        <h2>Best Template Site</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_1.png" alt="">
                        </div>
                        <h4>High Quality Design</h4>
                        <p>Etiam viverra nibh at lorem hendrerit porta non nec ligula. Donec hendrerit porttitor
                            pretium. Suspendisse fermentum nec risus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_2.png" alt="">
                        </div>
                        <h4>Fully Customizable</h4>
                        <p>Vivamus nec vehicula felis, sit amet convallis ex. Aenean dolor risus, rutrum at tincidunt
                            eget, placerat ac mauris.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_3.png" alt="">
                        </div>
                        <h4>Best HTML CSS Layout</h4>
                        <p>Praesent nec dui sed urna pharetra dapibus at ac elit. Aenean hendrerit metus leo, quis
                            viverra purus condimentum nec.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="down-services">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="left-content">
                                    <h4>In hac habitasse platea dictumst</h4>
                                    <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a
                                        sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus
                                        fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam.
                                        Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo.
                                        In hac habitasse platea dictumst.</p>
                                    <div class="blue-button">
                                        <a href="#">Discover More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="accordions">
                                    <ul class="accordion">
                                        <li>
                                            <a>Ut in dapibus ipsum</a>
                                            <p>Nulla eget aliquet dui, vitae tincidunt nulla. Sed sagittis odio vitae
                                                auctor volutpat. In semper ex neque, ut hendrerit mauris rutrum eget.
                                                Integer consectetur neque eu enim dictum porta. Sed et risus ac sapien
                                                congue mattis.</p>
                                        </li>
                                        <li>
                                            <a>Vivamus ligula metus</a>
                                            <p>Integer vel augue arcu. Fusce ac turpis cursus, malesuada nulla quis,
                                                lobortis dui. Etiam blandit, erat efficitur rhoncus pellentesque, ligula
                                                turpis tempor dolor.</p>
                                        </li>
                                        <li>
                                            <a>Suspendisse dapibus</a>
                                            <p>Nullam nibh lacus, rhoncus sit amet feugiat vel, porttitor sit amet nibh.
                                                Pellentesque feugiat justo nec enim pretium, sed faucibus lacus aliquam.
                                                Sed ac interdum mauris.</p>
                                        </li>
                                    </ul> <!-- / accordion -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <span>Video Presentation</span>
                <h2>Sed et risus ac sapien congue mattis.</h2>
                <a href="http://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
            </div>
        </div>
        <video autoplay="" loop="" muted>
            <source src="highway-loop.mp4" type="video/mp4" />
        </video>
    </section>



    <section class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Pricing Tables</span>
                        <h2>Duis molestie ipsum id faucibus fermentum</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="table-item">
                        <div class="top-content">
                            <h4>Starter Plan</h4>
                            <h1>$25</h1>
                            <span>/monthly</span>
                        </div>
                        <ul>
                            <li><a href="#">100 Suspendisse dapibus</a></li>
                            <li><a href="#">10x Paleo celiac enamel</a></li>
                            <li><a href="#">Williamsburg organic post ironic</a></li>
                            <li><a href="#">Helvetica pinterest yuccie</a></li>
                            <li><a href="#">Plaid shabby chic godard</a></li>
                        </ul>
                        <div class="blue-button">
                            <a href="#">Buy It Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-item">
                        <div class="top-content">
                            <h4>Premium Plan</h4>
                            <h1>$45</h1>
                            <span>/monthly</span>
                        </div>
                        <ul>
                            <li><a href="#">200 Suspendisse dapibus</a></li>
                            <li><a href="#">20x Paleo celiac enamel</a></li>
                            <li><a href="#">Williamsburg organic post ironic</a></li>
                            <li><a href="#">Helvetica pinterest yuccie</a></li>
                            <li><a href="#">Plaid shabby chic godard</a></li>
                        </ul>
                        <div class="blue-button">
                            <a href="#">Buy It Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-item">
                        <div class="top-content">
                            <h4>Advanced Plan</h4>
                            <h1>$85</h1>
                            <span>/monthly</span>
                        </div>
                        <ul>
                            <li><a href="#">400 Suspendisse dapibus</a></li>
                            <li><a href="#">40x Paleo celiac enamel</a></li>
                            <li><a href="#">Williamsburg organic post ironic</a></li>
                            <li><a href="#">Helvetica pinterest yuccie</a></li>
                            <li><a href="#">Plaid shabby chic godard</a></li>
                        </ul>
                        <div class="blue-button">
                            <a href="#">Buy It Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact" id="contact">
        <div id="map">
            <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907"
                width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        </div>

        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="wrapper">
                    <div class="section-heading">
                        <span>Contact Us</span>
                        <h2>Vivamus nec vehicula felis</h2>
                    </div>
                    <!-- Modal button -->
                    <button id="modBtn" class="modal-btn">Talk to us</button>
                </div>
                <div id="modal" class="modal">
                    <!-- Modal Content -->
                    <div class="modal-content">
                        <div class="close fa fa-close"></div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="left-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="section-heading">
                                                <span>Talk To Us</span>
                                                <h2>Let's have a discussion</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="name" type="text" class="form-control" id="name"
                                                    placeholder="Your name..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="subject" type="text" class="form-control" id="subject"
                                                    placeholder="Subject..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <textarea name="message" rows="6" class="form-control" id="message"
                                                    placeholder="Your message..." required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="btn">Send Message</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="right-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="content">
                                                <div class="section-heading">
                                                    <span>More About Us</span>
                                                    <h2>Venue Company</h2>
                                                </div>
                                                <p>Etiam viverra nibh at lorem hendrerit porta non nec ligula. Donec
                                                    hendrerit porttitor pretium. Suspendisse fermentum nec risus eu
                                                    bibendum.</p>
                                                <ul>
                                                    <li><span>Phone:</span><a href="#">010-050-0550</a></li>
                                                    <li><span>Email:</span><a href="#">hi@company.co</a></li>
                                                    <li><span>Address:</span><a href="#">company.co</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="img/footer_logo.png" alt="Venue Logo">
                        </div>
                        <p>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa.
                            Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="#"><i class="fa fa-stop"></i>Help FAQs</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Register</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Login</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>My Profile</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>How It Works?</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>More About Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="#"><i class="fa fa-stop"></i>Our Clients</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Partnerships</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Blog Entries</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p>Praesent iaculis gravida elementum. Proin fermentum neque facilisis semper pharetra. Sed
                            vestibulum vehicula tincidunt.</p>
                        <ul>
                            <li><span>Phone:</span><a href="#">010-050-0550</a></li>
                            <li><span>Email:</span><a href="#">hi@company.co</a></li>
                            <li><span>Address:</span><a href="#">company.co</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright &copy; 2018 Company Name

            - Design: <a rel="nofollow" href="http://www.templatemo.com">Template Mo</a></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>