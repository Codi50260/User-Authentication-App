<?php include('connect.php');

    $sql = "SELECT user_name FROM users";
    $sql2 = "SELECT book_name, year, genre, age_group FROM books";
    $sql3 = "SELECT author_name, age, genre, book_id FROM authors";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);

    $name = [];

    $book_name = [];
    $year = [];
    $genre = [];
    $age_group = [];

    $author_name = [];
    $age = [];
    $genre_author = [];
    $book_id = [];

    if($result){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                array_push($name, $row["user_name"]);
            }
        }
    } else {
        echo "Error selecting table " . $conn->error;
    }
    if($result2){
        if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()) {
                array_push($book_name, $row["book_name"]);
                array_push($year, $row["year"]);
                array_push($genre, $row["genre"]);
                array_push($age_group, $row["age_group"]);
            }
        }
    } else {
        echo "Error selecting table " . $conn->error;
    }
    if($result3){
        if($result3->num_rows > 0){
            while($row = $result3->fetch_assoc()) {
                array_push($author_name, $row["author_name"]);
                array_push($age, $row["age"]);
                array_push($genre_author, $row["genre"]);
                array_push($book_id, $row["book_id"]);
            }
        }
    } else {
        echo "Error selecting table " . $conn->error;
    }

    // var_dump($name);

    // var_dump($book_name);
    // var_dump($year);
    // var_dump($genre);
    // var_dump($age_group);

    // var_dump($author_name);
    // var_dump($age);
    // var_dump($genre_author);
    // var_dump($book_id);
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
                                <div style="text-align: right;">
                                    <button onclick="window.location.href='library_member.php'">Switch to Member mode:</button>
                                </div>
                                <div class="filter-box">
                                    <h3><?php echo "Welcome Back ".$name[0]."! <p></p>What are you looking for?";?></h3>
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
                                <button onclick="window.location.href='Add_Book.php'">Add new book</button>
                                <button onclick="window.location.href='Edit_Author.php'">Edit Authors</button>
                                <ul>
                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Gatsby.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[0]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[0]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[0]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[0]?> on the <?php echo $year[0]?>. It is for the ages of <?php echo $age_group[0]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\TLOR.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[1]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[1]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[1]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[1]?> on the <?php echo $year[1]?>. It is for the ages of <?php echo $age_group[1]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Harry Potter.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[2]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[2]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[2]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[2]?> on the <?php echo $year[2]?>. It is for the ages of <?php echo $age_group[2]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Scouting.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[3]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[3]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[3]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[3]?> on the <?php echo $year[3]?>. It is for the ages of <?php echo $age_group[3]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Hobbit.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[4]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[1]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[4]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[1]?> on the <?php echo $year[4]?>. It is for the ages of <?php echo $age_group[4]?></p><div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Mockingbird.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[5]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[4]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[5]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[4]?> on the <?php echo $year[5]?>. It is for the ages of <?php echo $age_group[5]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Anna.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[6]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[5]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[6]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[5]?> on the <?php echo $year[6]?>. It is for the ages of <?php echo $age_group[6]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\One Hundred.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[7]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[6]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[7]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[6]?> on the <?php echo $year[7]?>. It is for the ages of <?php echo $age_group[7]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li>
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Invisible man.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="books-media-detail-v2.html"><?php echo $book_name[8]?></a></h4>
                                                    <p><strong>Author: </strong><?php echo $author_name[7]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[8]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[7]?> on the <?php echo $year[8]?>. It is for the ages of <?php echo $age_group[8]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="Edit_Book.php" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <i class="fa fa-book"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="blog-tags" data-placement="top" title="Delete Book">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
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