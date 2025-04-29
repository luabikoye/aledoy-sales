<?php


include('admin/connect.php'); 


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
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="index.php">Home</a></li>
                                <?php
                                $query_cat = "select * from categories";
                                $result_cat = mysqli_query($conn,$query_cat);
                                $num_cat = mysqli_num_rows($result_cat);
                                for($i=0; $i<$num_cat; $i++)
                                {
                                $row_cat = mysqli_fetch_array($result_cat);

?>
                                <li class='active'><a
                                        href="categories.php?cat_id=<?php echo $row_cat['id']; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>



    <section class="banner" id="top" style="background-image:url(admin/<?php echo $row['image']; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2><?php echo $row['heading']; ?></h2>
                        <span><?php echo $row['sub_heading']; ?></span>
                        <div class="blue-button">
                            <a class="scrollTo" data-scrollTo="popular" href="#">Discover More</a>
                        </div>
                    </div>
                    <div class="submit-form">
                        <form id="form-submit" action="search-products.php" method="post">
                            <div class="row">
                                <div class="col-md-3 first-item">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Your name...">
                                    </fieldset>
                                </div>
                                
                                <div class="col-md-3 third-item">
                                    <fieldset>
                                        <select required name='category' onchange='this.form.()'>
                                           
                                            <option value="">Choose Category</option>
                                           <?php 
                                           $cat = "SELECT * FROM categories";
                                           $result_cat = mysqli_query($conn,$cat);
                                           $num_cat = mysqli_num_rows($result_cat);
                                           for ($i=0; $i < $num_cat; $i++) { 
                                            $row_cat = mysqli_fetch_array($result_cat);         
                                           ?>
                                           <option value="<?= $row_cat['id']?>"><?= $row_cat['cat_name']?></option>
                                           <?php }?>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn">Search Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="our-services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                         <span>Category -> <?php echo $search_text; ?></span>
                        <h2>Best Template Site</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                     <?php

                                $cat_id = $_GET['cat_id'];

                               

        
                                $row_cat = mysqli_fetch_array($result_cat);
                                  $query_product = "SELECT * FROM products WHERE cat_id = $cat_id";
    $result_product = mysqli_query($conn, $query_product);
    $num_product = mysqli_num_rows($result_product);

    for ($j = 0; $j < $num_product; $j++) {
        $row_pr = mysqli_fetch_array($result_product);

?>
                               
                    <div class="down-services">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="left-content">

                                    <img src="admin/<?php echo($row_pr['image_1']); ?>" alt="<?php echo ($row_pr['title']); ?>">
                                    <div>
                                        <br><br>
                              <h4><?php echo ($row_pr['title']); ?><h4>                                   </div>
                                    <div class="blue-button">N
                                    <?php echo number_format($row_pr['price']); ?>
                                    </div>
                                </div>
                                <div>
                                    <a href="product-details.php?id=<?php echo $row_pr['id']; ?>"> <button class="btn-secondary">Add to Cart</button>
                                    </a>
                                </div>
                            </div>
                             <?php } ?>
                            <div class="col-md-5">
                                <h4>In hac habitasse platea dictumst</h4>
                                <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a
                                    sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus
                                    fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam.
                                    Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo.
                                    In hac habitasse platea dictumst.</p>
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