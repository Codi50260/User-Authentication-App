<?php include('connect.php');
    session_start();

    $sql = "SELECT user_name, user_email, user_role FROM users";
    $sql2 = "SELECT book_name, year, genre, age_group FROM books";
    $sql3 = "SELECT author_name, age, genre, book_id FROM authors";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);

    $name = [];
    $email = [];
    $role = [];
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
                array_push($email, $row["user_email"]);
                array_push($role, $row["user_role"]);
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

    $asd = $_SESSION['email_sign_in'];
    for ($p=0; $p < count($name); $p++) {
        if ($asd == $email[$p]){
            $userName = $name[$p];
            $userRole = $role[$p];
            $_SESSION['userName'] = $userName;
        }
    }
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
        <script>
            function move(num, num2){
                for (var x=0; x < 1; x++){
                    $(num).after().appendTo(num2);
                }
            }
            function sortBooks(){
                $('.sort-me').sort(function(a, b) {
                    if (a.textContent < b.textContent) {
                        return -1;
                    } else {
                        return 1;
                    }
                }).appendTo('.here');
            }
            function sortGenres(){
                // let y = document.getElementsByClassName('sort-me');
                // y[i].style.display="none";
                for (let i=1; i < 10; i++) {
                    move(".".concat(i), ".t".concat(i));
                }
                for (let i=1; i < 10; i++) {
                    move(".a".concat(i), ".at".concat(i));
                }
                $('.sort-me').sort(function(a, b) {
                    if (a.textContent < b.textContent) {
                        return -1;
                    } else {
                        return 1;
                    }
                }).appendTo('.here');
                for (let i=1; i < 10; i++) {
                    move(".t".concat(i), ".r".concat(i));
                }
                for (let i=1; i < 10; i++) {
                    move(".at".concat(i), ".ar".concat(i));
                }
            }
            function sort(){
                value = document.getElementById('sort-by').value;
                if (value == 'Title'){
                    sortBooks();
                } else if (value == 'Genre'){
                    sortGenres();
                }
            }
            function search_books() {
                let input = document.getElementById('searchbar').value
                input=input.toLowerCase();
                let y = document.getElementsByClassName('sort-me');
                let x = document.getElementsByClassName('search-here');
                let z = document.getElementsByClassName('Notauthor');
                
                for (i = 0; i < x.length; i++) {
                    if (!x[i].innerHTML.toLowerCase().includes(input)) {
                        y[i].style.display="none";
                    } else {
                        y[i].style.display="inline-block";
                    }

                    // if (z[i].innerHTML.toLowerCase().includes(input)) {
                    //     y[i].style.display="none";
                    //     console.log("Author is here")
                    // } else {
                    //     y[i].style.display="inline-block";
                    // }
                }
            }
            function diffMode(){
                var user_role = "<?php echo $userRole ?>"
                if (user_role == 'librarian'){
                    window.location.href = "library_librarian.php";
                } else {
                    document.getElementById("tooltip").style.visibility = "visible"
                }
            }
        </script>

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
                                <!-- <div style="text-align: right;">
                                    <button onclick="window.location.href='library_librarian.php'">Switch to Librarian mode:</button>
                                </div> -->
                                <div class="filter-box">
                                    <h3><?php echo "Welcome Back ".$userName."! <p></p>What are you looking for?";?></h3>
                                    <form action="#" method="post" style="align-items: center;">

                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" id="searchbar" onkeyup="search_books()" type="text" name="search" placeholder="Search by Keyword">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3">
                                            <select name="orderby" id="sort-by">
                                                <option value="Title" selected="selected">Sort by Title</option>
                                                <option value="Genre">Sort by Genre</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="button" value="Sort" onclick="sort()">
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="button" value="Switch to Librarian mode:" onclick="diffMode()" style="width: 250px">
                                                <span id="tooltip" style="visibility: hidden;width: 150px;background-color: red;color: #fff;text-align: center;border-radius: 6px;position: absolute;z-index: 1;top: 79%;left: 66%;margin-left: -60px;">Sorry, only Librarians can Access this</span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clear"></div>
                            </section>
                            <!-- End: Search Section -->
                            
                            <div class="booksmedia-fullwidth">
                                <ul class="here">
                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Gatsby.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r1"></h4>
                                                    <h4 class="1"><?php echo $book_name[0]?></h4>
                                                    <p class="ar1"><strong></strong></p>
                                                    <p class="a1 Notauthor"><strong>Author: </strong><?php echo $author_name[0]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[0]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[0]?> on the <?php echo $year[0]?>. It is for the ages of <?php echo $age_group[0]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\TLOR.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r2"></h4>
                                                    <h4 class="2"><?php echo $book_name[1]?></h4>
                                                    <p class="ar2"><strong></strong></p>
                                                    <p class="a2 Notauthor"><strong>Author: </strong><?php echo $author_name[1]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[1]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[1]?> on the <?php echo $year[1]?>. It is for the ages of <?php echo $age_group[1]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Harry Potter.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r3"></h4>
                                                    <h4 class="3"><?php echo $book_name[2]?></h4>
                                                    <p class="ar3"><strong></strong></p>
                                                    <p class="a3 Notauthor"><strong>Author: </strong><?php echo $author_name[2]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[2]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[2]?> on the <?php echo $year[2]?>. It is for the ages of <?php echo $age_group[2]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Scouting.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r4"></h4>
                                                    <h4 class="4"><?php echo $book_name[3]?></h4>
                                                    <p class="ar4"><strong></strong></p>
                                                    <p class="a4 Notauthor"><strong>Author: </strong><?php echo $author_name[3]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[3]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[3]?> on the <?php echo $year[3]?>. It is for the ages of <?php echo $age_group[3]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Hobbit.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r5"></h4>
                                                    <h4 class="5"><?php echo $book_name[4]?></h4>
                                                    <p class="ar5"><strong></strong></p>
                                                    <p class="a5 Notauthor"><strong>Author: </strong><?php echo $author_name[1]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[4]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[1]?> on the <?php echo $year[4]?>. It is for the ages of <?php echo $age_group[4]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Mockingbird.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r6"></h4>
                                                    <h4 class="6"><?php echo $book_name[5]?></h4>
                                                    <p class="ar6"><strong></strong></p>
                                                    <p class="a6 Notauthor"><strong>Author: </strong><?php echo $author_name[4]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[5]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[4]?> on the <?php echo $year[5]?>. It is for the ages of <?php echo $age_group[5]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Anna.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r7"></h4>
                                                    <h4 class="7"><?php echo $book_name[6]?></h4>
                                                    <p class="ar7"><strong></strong></p>
                                                    <p class="a7 Notauthor"><strong>Author: </strong><?php echo $author_name[5]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[6]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[5]?> on the <?php echo $year[6]?>. It is for the ages of <?php echo $age_group[6]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\One Hundred.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r8"></h4>
                                                    <h4 class="8"><?php echo $book_name[7]?></h4>
                                                    <p class="ar8"><strong></strong></p>
                                                    <p class="a8 Notauthor"><strong>Author: </strong><?php echo $author_name[6]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[7]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[6]?> on the <?php echo $year[7]?>. It is for the ages of <?php echo $age_group[7]?></p>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Invisible man.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r9"></h4>
                                                    <h4 class="9"><?php echo $book_name[8]?></h4>
                                                    <p class="ar9"><strong></strong></p>
                                                    <p class="a9 Notauthor"><strong>Author: </strong><?php echo $author_name[7]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[8]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[7]?> on the <?php echo $year[8]?>. It is for the ages of <?php echo $age_group[8]?></p>
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
                            <div class="t1"></div>
                            <div class="t2"></div>
                            <div class="t3"></div>
                            <div class="t4"></div>
                            <div class="t5"></div>
                            <div class="t6"></div>
                            <div class="t7"></div>
                            <div class="t8"></div>
                            <div class="t9"></div>
                            <div class="at1"></div>
                            <div class="at2"></div>
                            <div class="at3"></div>
                            <div class="at4"></div>
                            <div class="at5"></div>
                            <div class="at6"></div>
                            <div class="at7"></div>
                            <div class="at8"></div>
                            <div class="at9"></div>
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