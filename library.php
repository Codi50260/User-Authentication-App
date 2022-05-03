<?php
    $email = $_POST['email'];
    $password = $_POST['pass'];

    echo "You have successfully logged in:"."<br>";
    echo "Email: ".$email."<br>";
    echo "Password: ".$password;
?>

<html lang="zxx">
<head>        

        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <!-- Title -->
        <title>Main Page</title>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-full-width">
                        <div class="container">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="filter-box">
                                    <h3>What are you looking for at the library?</h3>
                                    <form action="#" method="post" style="align-items: center;">

                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="submit" value="Search">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3">
                                            <select name="orderby">
                                                <option selected="selected">Sort by Title</option>
                                                <option>Sort by Authors</option>
                                                <option>Sort by Genre</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="submit" value="Sort">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clear"></div>
                            </section>
                            <!-- End: Search Section -->
                            
                            <div class="booksmedia-fullwidth">
                                <ul>
                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-01.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-02.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-03.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-04.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-05.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-06.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-07.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-07.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images/books-media/layout-3/books-media-layout3-09.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html">The Great Gatsby</a></h4>
                                                    <p><strong>Author:</strong>  F. Scott Fitzgerald</p>
                                                    <p><strong>ISBN:</strong>  9781581573268</p>
                                                </header>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>
                                </ul>
                            </div>
                            <nav class="navigation pagination text-center">
                                <h2 class="screen-reader-text">Posts navigation</h2>
                                <div class="nav-links">
                                    <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                                    <a class="page-numbers current" href="#.">1</a>
                                    <a class="page-numbers" href="#.">2</a>
                                    <a class="page-numbers" href="#.">3</a>
                                    <a class="page-numbers" href="#.">4</a>
                                    <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <br><br>
        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="js/bxslider.min.js"></script>
        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="js/main_book.js"></script>

    </body>
</html>